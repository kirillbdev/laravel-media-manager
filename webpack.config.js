const {VueLoaderPlugin} = require('vue-loader');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const path = require('path');

module.exports = {
  entry: {
    './public/assets/js/media-manager': './resources/js/entry.js',
    './../../public/vendor/kirillbdev/media-manager/assets/media-manager': './resources/js/entry.js',
  },
  output: {
    filename: '[name].min.js',
    path: path.resolve(__dirname, '')
  },
  plugins: [
    new VueLoaderPlugin(),
    new MiniCssExtractPlugin({
      filename: "[name].min.css",
    }),
  ],
  module: {
    rules: [
      {
        test: /\.vue$/,
        loader: 'vue-loader'
      },
      {
        test: /\.s[ac]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader',
        ],
      },
    ]
  },
  resolve:
    {
      alias: {
        store$: path.resolve(__dirname, 'resources/js/store/index.js'),
      }
    }
};
