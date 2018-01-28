const webpack = require('webpack');
const resolve = require('path').resolve;
module.exports = () => {
    return {
        context: resolve('src'), //absaloute path
        entry: './index.js',
        output: {
            path: resolve('dist'),
            filename: "bundle.js",
            publicPath: "/dist/" // start from dist instead of /
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
};