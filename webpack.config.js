const path = require("path");

module.exports = {
    entry: "./source/_webpack/main.js",
    output: {
        filename: "bundle.js",
        path: path.resolve(__dirname, "source/js")
    },
    devtool: "source-map"
};
