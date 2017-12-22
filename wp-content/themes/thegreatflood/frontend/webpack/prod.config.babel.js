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
        use: ExtractTextPlugin.extract({
          use: [
            {loader: "css-loader", options: {url: false}},
            {loader: 'postcss-loader', options: {autoprefixer: true}},
            {loader:'sass-loader'}
          ]
        }),
      }
    ]
  },
  plugins: [
    new webpack.EnvironmentPlugin(['NODE_ENV']),
    new ExtractTextPlugin('style.css'),
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
