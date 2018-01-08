'use strict'

import path from 'path'
import webpack from 'webpack'
import merge from 'webpack-merge'
import base from './base.config.babel.js'

export default merge( base, {
  entry:  __dirname.replace( '/webpack', '' ) + '/app.dev.js',
  devtool: 'eval-source-map',
  module: {
    loaders: [
      {
        test: /\.s[ac]ss$/,
        loader: 'style-loader!css-loader?url=false!sass-loader',
      }
    ]
  },
  plugins: [
    new webpack.EnvironmentPlugin(['NODE_ENV']),
    new webpack.LoaderOptionsPlugin({
      minimize: false,
    }),
  ]
});
