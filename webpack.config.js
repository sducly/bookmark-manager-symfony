const path = require('path');
const webpack = require('webpack');
const DashboardPlugin = require('webpack-dashboard/plugin');
const Dotenv = require('dotenv-webpack');

const is_dev_env = process.env.NODE_ENV === "development";

//--------------------------------------------
// config
const CONFIG = {};

CONFIG.alias = {
    fo: path.resolve(__dirname, './src/FrontBundle/Resources/webpack/')
};

CONFIG.entry = {
    fo: path.resolve(__dirname, './src/FrontBundle/Resources/webpack/Fo.tsx')
};

CONFIG.output = {
    path: __dirname + '/web/build/',
    publicPath: '/build/',
};

if (is_dev_env) {
    CONFIG.output.js = '[name].dev.js';
    CONFIG.output.css = '[name].dev.css';
    CONFIG.output.manifest = 'manifest.dev.json';
} else {
    CONFIG.output.js = '[name].prod.js';
    CONFIG.output.css = '[name].prod.css';
    CONFIG.output.manifest = 'manifest.prod.json';
}

//--------------------------------------------
// webpack config
const WEBPACK_CONFIG = {};

const ExtractTextPlugin = require('extract-text-webpack-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');


if (is_dev_env) {
    WEBPACK_CONFIG.devtool = "source-map";

    WEBPACK_CONFIG.plugins = [
        new Dotenv(),
        new DashboardPlugin(),
        new ExtractTextPlugin(CONFIG.output.css),
        new webpack.HotModuleReplacementPlugin(),
        new webpack.LoaderOptionsPlugin({
            minimize: false,
            debug: true
        }),
        new ManifestPlugin({
            fileName: CONFIG.output.manifest,
            basePath: CONFIG.output.publicPath
        })
    ];

    WEBPACK_CONFIG.devServer = {
        hot: true,
        contentBase: path.resolve(__dirname),
        host: '127.0.0.1',
        port: 9010,
        headers: {'Access-Control-Allow-Origin': '*'},
        stats: {
            colors: true
        }
    };

} else {
    WEBPACK_CONFIG.plugins = [
        new ExtractTextPlugin(CONFIG.output.css),
        new webpack.optimize.UglifyJsPlugin({
            compress: {warnings: false},
            output: {comments: false}
        }),
        new webpack.LoaderOptionsPlugin({
            minimize: true,
            debug: false
        }),
        new ManifestPlugin({
            fileName: CONFIG.output.manifest,
            basePath: CONFIG.output.publicPath
        })
    ];
}


//--------------------------------------------
// Webpack config

WEBPACK_CONFIG.resolve = {
    modules: [
        "node_modules"
    ],
    extensions: [".ts", ".tsx", ".js", ".json", ".scss"],
    alias: CONFIG.alias
};

WEBPACK_CONFIG.entry = CONFIG.entry;

WEBPACK_CONFIG.output = {
    filename: CONFIG.output.js,
    path: CONFIG.output.path,
    publicPath: CONFIG.output.publicPath,
};

WEBPACK_CONFIG.module = {
    rules: [
        {
            test: /\.js$/,
            exclude: [/node_modules/],
            use: [{
                loader: 'babel-loader',
                options: {presets: ['es2015', 'stage-2']}
            }]
        },
        {
            test: /(\.css|\.scss)$/,
            use: ExtractTextPlugin.extract({
                fallback: "style-loader",
                use: [{
                    loader: "css-loader", options: {
                        sourceMap: is_dev_env
                    }
                }, {
                    loader: "sass-loader", options: {
                        sourceMap: is_dev_env
                    }
                }]
            })
        },
        {
            test: /\.(png|jpe?g|gif|ico)$/,
            use: [{
                loader: 'file-loader',
                options: {
                    name: 'images/[name].[ext]'
                }
            }]
        },
        {
            test: /\.svg$/,
            loader: 'url-loader',
            options: {
                'limit': 65000,
                'mimetype': 'image/svg+xml',
                'name': 'public/fonts/[name].[ext]'
            }
        },
        {
            test: /\.woff$/,
            loader: 'url-loader',
            options: {
                'limit': 65000,
                'mimetype': 'application/font-woff',
                'name': 'public/fonts/[name].[ext]'
            }
        },
        {
            test: /\.woff2$/,
            loader: 'url-loader',
            options: {
                'limit': 65000,
                'mimetype': 'application/font-woff2',
                'name': 'public/fonts/[name].[ext]'
            }
        },
        {
            test: /\.[ot]tf$/,
            loader: 'url-loader',
            options: {
                'limit': 65000,
                'mimetype': 'application/octet-stream',
                'name': 'public/fonts/[name].[ext]'
            }
        },
        {
            test: /\.eot$/,
            loader: 'url-loader',
            options: {
                'limit': 65000,
                'mimetype': 'application/vnd.ms-fontobject',
                'name': 'public/fonts/[name].[ext]'
            }
        },
        { test: /\.tsx?$/, loader: "awesome-typescript-loader" },
        { enforce: "pre", test: /\.js$/, loader: "source-map-loader" }
    ]
};

module.exports = WEBPACK_CONFIG;