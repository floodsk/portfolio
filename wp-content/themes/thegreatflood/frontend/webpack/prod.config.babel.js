'use strict'

import webpack from 'webpack'
import merge from 'webpack-merge'
import base from './base.config.babel.js'
import UglifyJsPlugin from 'uglifyjs-webpack-plugin'

export default merge( base, {
  entry:  (__dirname.replace( '/webpack', '' ) + '/app.prod.js'),
  plugins: [
    new webpack.EnvironmentPlugin(['NODE_ENV']),
    new UglifyJsPlugin({
      uglifyOptions: {
        ecma: 8,
        output: {
          comments: false,
          beautify: false,
        },
        compress: true,
        warnings: false
      }
    }),
  ]
});
