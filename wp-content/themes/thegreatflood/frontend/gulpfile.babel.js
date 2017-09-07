'use strict'

// Node Core
import fs from 'fs'

// Gulp and Plugins
import gulp from 'gulp'
import util from 'gulp-util'
import concat from 'gulp-concat'
import rename from 'gulp-rename'
import stylus from 'gulp-stylus'
import css from 'gulp-clean-css'
import modernizr from 'gulp-modernizr'
import autoprefixer from 'gulp-autoprefixer'

// Helpers
import source from 'vinyl-source-stream'
import browserify from 'browserify'
import buffer from 'vinyl-buffer'
import uglify from 'uglify-js'

// Stylus Libraries
import nib from 'nib'
import jeet from 'jeet'
import rupture from 'rupture'

gulp.task('css:build', ['js:build'], ()=> {

	return gulp.src('./source/stylus/index.styl')
		.pipe(stylus({
			url: {
				name: 'embedurl',
				paths: ['./assets'],
			},
			paths: ['node_modules'],
			import: ['jeet/styl/index', 'rupture/rupture/index', 'nib/index'],
			use: [nib(), jeet(), rupture()],
			'include css': true
		}))
		.pipe(buffer())
		.pipe(autoprefixer({
			browsers: ['last 20 versions'],
			cascade: true
		}))
		.pipe(buffer())
		.pipe(rename( 'style.css' ))
		.pipe(gulp.dest('./build'));

});

gulp.task('css:minify', ['modernizr'], ()=> {

	return gulp.src('./build/style.css')
		.pipe(buffer())
		.pipe(css())
		.pipe(rename('style.css'))
		.pipe(gulp.dest('./build'));

});

gulp.task('css:concat', ['css:minify'], () => {

	return gulp.src(['./build/wp-theme-info.css', './build/style.css'])
		.pipe(concat('style.css'))
		.pipe(gulp.dest('../'));

});

gulp.task('js:build', ()=> {

	return browserify({
			entries: './source/babel/main.jsx',
			debug: /development/gi.test( util.env.mode ) ? true : false,
			extensions: ['.jsx'],
			paths: ['./node_modules', './source/babel']
		})
		.transform('babelify', {presets: ["es2015", "react"]})
		.transform('envify', {NODE_ENV: util.env.mode})
		.transform('browserify-shim')
		.bundle()
		.on('error', (err)=> {
			console.log( err.stack );
		})
		.pipe(source(/development/gi.test(util.env.mode) ? 'script.min.js'  : 'script.js'))
		.pipe(buffer())
		.pipe(gulp.dest(/development/gi.test(util.env.mode) ? '../'  : './build'));

});

gulp.task('modernizr', ['css:build'], function () {
	return gulp.src(['./build/*.js', './build/*.css', '../*.php'])
		.pipe(modernizr(/development/gi.test(util.env.mode) ? 'modernizr.min.js'  : 'modernizr.js'))
		.pipe(gulp.dest(/development/gi.test(util.env.mode) ? '../' : './build'))
});

gulp.task('js:minify', ['modernizr'], ()=> {

	var js = uglify.minify('./build/script.js', {
		mangle: true,
		compress: {
			sequences: true,
			dead_code: true,
			conditionals: true,
			booleans: true,
			unused: true,
			if_return: true,
			join_vars: true,
			drop_console: /development/gi.test( util.env.mode ) ? false : true,
			drop_debugger: /development/gi.test( util.env.mode ) ? false : true,
		}
	});
	var modernizr = uglify.minify('./build/script.js', {
		mangle: true,
		compress: {
			sequences: true,
			dead_code: true,
			conditionals: true,
			booleans: true,
			unused: true,
			if_return: true,
			join_vars: true,
			drop_console: /development/gi.test(util.env.mode) ? false : true,
			drop_debugger: /development/gi.test(util.env.mode) ? false : true,
		}
	});
	if ( js.error ) return console.log( js.error );
	fs.writeFileSync('../script.min.js', js.code);
	return fs.writeFileSync('../modernizr.min.js', modernizr.code);

});

gulp.task( 'build:cleanup', ['css:concat'], ()=> {

	fs.exists('./build/style.css', ( exists )=> {
	  if ( exists ) {
	    console.log( 'Build style.css file exists. Deleting now ...' );
	    fs.unlink( './build/style.css' );
	  }
	});

	fs.exists('./build/script.js', ( exists )=> {
	  if ( exists ) {
	    console.log( 'Unminified script.js file exists. Deleting now ...' );
	    fs.unlink( './build/script.js' );
	  }
	});

	return fs.exists('./build/modernizr.js', (exists) => {
		if (exists) {
			console.log('Unminified modernizr.js file exists. Deleting now ...');
			fs.unlink('./build/modernizr.js');
		}
	});

});

gulp.task('build:dev', ['modernizr','css:concat']);
gulp.task('build:prod', ['build:cleanup']);
gulp.task('default', ['build:prod']);
gulp.task('dev', ['build:dev']);
gulp.task('prod', ['build:prod']);
