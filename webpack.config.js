let path = require('path');

const VueLoaderPlugin = require('vue-loader/lib/plugin');

let entries = {};

function addEntry(src, dest) {
  entries['../../public/vendor/kirillbdev/media-manager/js/' + dest] = src;
  entries['public/assets/js/' + dest] = src;
}

addEntry('./resources/js/entry.js', 'media-manager');

module.exports = {
  entry: entries,
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