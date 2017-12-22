'use strict'

import path from 'path'
import webpack from 'webpack'
import merge from 'webpack-merge'
import base from './base.config.babel.js'
import UglifyJsPlugin from 'uglifyjs-webpack-plugin'
import ExtractTextPlugin from 'extract-text-webpack-plugin'

export default merge( base, {
  module: {
    loaders: [
      {
        test: /\.s[ac]ss$/,
        use: ExtractTextPlugin.extract("css-loader?url=false", 'postcss-loader?autoprefixer=true', "sass-loader"),
      }
    ]
  },
  plugins: [
    new webpack.EnvironmentPlugin(['NODE_ENV']),
    new ExtractTextPlugin({
      filename: './style.css',
      allChunks: true
    }),
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
    new webpack.LoaderOptionsPlugin({
      minimize: true,
    }),
  ]
});
