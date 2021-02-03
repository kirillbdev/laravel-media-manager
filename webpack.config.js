let path = require('path');

const VueLoaderPlugin = require('vue-loader/lib/plugin');

module.exports = {
  entry: {
    'public/js/media-manager': './resources/js/entry.js'
  },
  output: {
      filename: '[name].min.js',
      path: path.resolve(__dirname, '')
  },
  plugins: [
    new VueLoaderPlugin(),
  ],
  module: {
    rules: [
      {
        test: /\.vue$/,
        use: 'vue-loader'
      },
      {
        test: /\.m?js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      }
    ]
  },
  resolve: {
    alias: {
      'vue$': 'vue/dist/vue.esm.js'
    }
  }
};