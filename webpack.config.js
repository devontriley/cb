const { PATHS, HOST, PORT, THEME_NAME } = require("./env.config");
const utils = require("./scripts/utils");
const webpack = require("webpack");
const path = require("path");
const WriteFilePlugin = require("write-file-webpack-plugin");
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const CopyWebpackPlugin = require("copy-webpack-plugin");

const ENV = utils.getEnv();
const WATCH = global.watch || false;

module.exports = {
    entry: getEntry(),

    output: {
        path: PATHS.compiled(),
        publicPath:
            ENV === "production"
                ? "/"
                : `http://${HOST}:${PORT}/cb/wp-content/themes/${THEME_NAME}/compiled/`,
        filename: "js/[name].js",
        sourceMapFilename: "[file].map"
    },

    module: {
        rules: [
            {
                test: /\.js$/,
                loader: "babel-loader",
                exclude: /node_modules/,
                include: PATHS.src()
            },
            {
                test: /\.css$/,
                loader: getCssLoader()
            },
            {
                test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
                use: [{
                    loader: 'file-loader',
                    options: {
                        name: '[name].[ext]',
                        outputPath: 'fonts/'
                    }
                }]
            }
        ]
    },

    mode: 'development',

    devtool: ENV === "production" ? false : "inline-source-map",

    plugins: getPlugins(ENV),

    target: "web",

    watch: WATCH
};

/*
  CONFIG ENV DEFINITIONS
 */

function getEntry() {
    const entry = {};
    entry.main = [PATHS.src("js", "main.js")];
    if (ENV === "development") entry.main.push("webpack-hot-middleware/client");
    return entry;
}

function getPlugins(env) {
    const plugins = [
        // Set global constant for environment at runtime
        new webpack.DefinePlugin({
            "process.env.NODE_ENV": JSON.stringify(env)
        }),

        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery'
        }),

        // Copy assets to compiled folder
        new CopyWebpackPlugin(
            [
                {
                    from: PATHS.src("assets"),
                    to: "assets"
                }
            ],
            {
                ignore: ["*.psd"]
            }
        )
    ];

    switch (env) {
        case "production":
            plugins.push(new ExtractTextPlugin("main.css"));
            // plugins.push(
            //   new webpack.optimize.UglifyJsPlugin({
            //     sourceMap: true,
            //     minimize: true,
            //     compress: { warnings: false }
            //   })
            // );
            break;

        case "development":
            plugins.push(new webpack.HotModuleReplacementPlugin());
            plugins.push(new webpack.NoEmitOnErrorsPlugin());
            plugins.push(new WriteFilePlugin());
            break;
    }

    return plugins;
}

function getCssLoader() {
    if (ENV === "production") {
        return ExtractTextPlugin.extract({
            fallback: "style-loader",
            use: "css-loader?importLoaders=1&minimize=true!postcss-loader"
        });
    } else {
        // importLoaders sets how many plugins to process @import rules with
        return "style-loader!css-loader?importLoaders=1!postcss-loader";
    }
}
