const path = require('path');
const CopyPlugin = require('copy-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  entry: './src/index.js', // your custom JS entry
  output: {
    filename: 'shoelace.js', // output JS
    path: path.resolve(__dirname, 'assets/shoelace') // everything goes in assets/shoelace
  },
  module: {
    rules: [
      {
        test: /\.css$/i,
        use: [MiniCssExtractPlugin.loader, 'css-loader']
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'shoelace.css' // output CSS
    }),
    new CopyPlugin({
      patterns: [
        {
          // Copy Shoelace assets (icons, fonts) into assets/shoelace/assets
          from: path.resolve(__dirname, 'node_modules/@shoelace-style/shoelace/dist/assets'),
          to: path.resolve(__dirname, 'assets/shoelace/assets')
        }
      ]
    })
  ],
  mode: 'production'
};
