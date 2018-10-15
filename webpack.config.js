const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const path = require("path");
const devMode = process.env.NODE_ENV !== "production";

module.exports = {
    mode: devMode ? "development" : "production",
    entry: {
        main: ["./_webpack/main.js", "./_sass/main.scss"],
        "editor-style": "./_sass/editor-style.scss"
    },
    output: {
        filename: "[name].js",
        path: path.resolve(__dirname, "dist/js")
    },
    devtool: "source-map",
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: devMode
                    ? [
                          MiniCssExtractPlugin.loader,
                          "css-loader", // translates CSS into CommonJS
                          "sass-loader" // compiles Sass to CSS, using Node Sass by default
                      ]
                    : [
                          MiniCssExtractPlugin.loader,
                          "css-loader", // translates CSS into CommonJS
                          "postcss-loader", // applies autoprefixer to CSS
                          "sass-loader" // compiles Sass to CSS, using Node Sass by default
                      ]
            }
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "../css/[name].css",
            chunkFilename: "../css/[id].css"
        })
    ],
    optimization: {
        minimizer: [
            new UglifyJsPlugin({
                cache: true,
                parallel: true,
                sourceMap: true // set to true if you want JS source maps
            }),
            new OptimizeCSSAssetsPlugin({})
        ]
    }
};
