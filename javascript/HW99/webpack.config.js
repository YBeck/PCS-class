const webpack = require('webpack');
module.exports = {
    entry: './index.js',
    output: {
        filename: "bundle.js",
    },
    module: {
        rules: [{
            test: /\.js$/,
            exclude: /(node_modules|bower_components)/,
            use: {
                loader: 'babel-loader',
                options: {
                    presets: ["env"]
                }
            }
        }, {
            test: /\.js$/,
            use: ["source-map-loader"],
            enforce: "pre"
        }]
    },
    plugins: [
        new webpack.optimize.UglifyJsPlugin(
            {
                sourceMap: true
            }
        ),
        new webpack.SourceMapDevToolPlugin({
            filename: 'original.js.map',
        })

    ]
};