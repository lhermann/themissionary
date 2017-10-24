const path = require("path");

module.exports = {
    entry: "./_webpack/main.js",
    output: {
        filename: "bundle.js",
        path: path.resolve(__dirname, "dist/js")
    },
    devtool: "source-map"
};
