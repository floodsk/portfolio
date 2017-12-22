'use strict'

import path from 'path'
import webpack from 'webpack'

export default {
  entry:  __dirname.replace( '/webpack', '' ) + '/app.js',
  node: {
    fs: 'empty'
  },
  output: {
    path:  __dirname.replace( '/frontend/webpack', '' ),
    publicPath: __dirname.replace( '/webpack', '' ),
    filename: 'script.min.js',
  },
  module: {
    loaders: [
      {
        test: /\.jsx$/,
        loader: 'babel-loader',
        query: {
          presets: ['es2015', 'react']
        }
      }
    ]
  },
  stats: {
    colors: true
  }
}
