/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../scss/global.scss');
require('bootstrap');
require('../scss/el-professor.scss');
require('../highlight/styles/agate.css');
require('highlight.js');

import hljs from 'highlight.js';

hljs.initHighlightingOnLoad();

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
var $ = require('jquery');
global.$ = global.jQuery = $;

console.log('Welcome to El Professor.');
