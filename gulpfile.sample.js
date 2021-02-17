/* 
	this is a sample gulpfile for your development environment. Rename it to gulpfile.js and modify the settings
	according to your development environment.
*/


const { src, dest, watch, series, parallel } = require('gulp');

const postcss = require('gulp-postcss');
const cssImport = require('postcss-import');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');

const uglify = require('gulp-uglify');

const imagemin = require('gulp-imagemin');

const del = require('del');

const browserSync = require('browser-sync').create();

/* CONFIG */

/* Server */

// Server address for local testing (e.g. as provided by Laravel Valet)
const proxyAddress = 'kirby3-studio.test';

/* File paths */

const srcFiles = {
	snippets: 'src/snippets/**/*',
	templates: 'src/templates/**/*',
	blueprints: 'src/blueprints/**/*.yml',
	css: 'src/css/main.css',
	js: 'src/js/**/*.js',
	images: 'src/images/**/*',
	fonts: 'src/fonts/**/*',
	plugins: 'src/plugins/**/*',
	controllers: 'src/controllers/**/*'
}

const destFiles = {
	snippets: 'site/snippets',
	templates: 'site/templates',
	blueprints: 'site/blueprints',
	css: 'assets/css',
	js: 'assets/js',
	images: 'assets/images',
	fonts: 'assets/fonts',
	plugins: 'site/plugins',
	dependencies: 'assets/vendor',
	controllers: 'site/controllers'
}

/* BrowserSync config */
function reload(done){
	browserSync.reload();
	done();
}

function serve(done){
	browserSync.init({
		proxy: proxyAddress,
		open: false // prevent browserSync from autmatically opening a browser window
	});
	done();
}

// Snippets task
function snippetsTask(){
	return src(srcFiles.snippets)
		.pipe(dest(destFiles.snippets))
}

// Templates task
function templatesTask(){
	return src(srcFiles.templates)
		.pipe(dest(destFiles.templates))
}

// Blueprints task
function blueprintsTask(){
	return src(srcFiles.blueprints)
		.pipe(dest(destFiles.blueprints))
}

// CSS task
function cssTask(){
	return src(srcFiles.css)
		/*.pipe(sourcemaps.init())*/
		.pipe(postcss())
		/*.pipe(sourcemaps.write('.'))*/
		.pipe(dest(destFiles.css))
}

// JS task
function jsTask(){
	return src(srcFiles.js)
		.pipe(sourcemaps.init())
		.pipe(uglify())
		.pipe(sourcemaps.write('.'))
		.pipe(dest(destFiles.js))
}

// Images task
function imagesTask(){
	return src(srcFiles.images)
		.pipe(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true }))
		.pipe(dest(destFiles.images))
}

// Fonts task
function fontsTask(){
	return src(srcFiles.fonts)
		.pipe(dest(destFiles.fonts))
}

// Kirby Plugins Task
function pluginsTask(){
	return src(srcFiles.plugins)
		.pipe(dest(destFiles.plugins))
}

// Copy dependencies to vendor folder
function copyDependenciesTask(){
	return src('node_modules/**/*')
		.pipe(dest('assets/vendor'))
}

// Controllers task
function controllersTask(){
	return src(srcFiles.controllers)
		.pipe(dest(destFiles.controllers))
}


// unbuild task
function unbuildTask(done){
	del(destFiles.dependencies+'/*');
	del(destFiles.snippets+'/*');
	del(destFiles.templates+'/*');
	del(destFiles.blueprints+'/*');
	del(destFiles.css+'/*');
	del(destFiles.js+'/*');
	del(destFiles.images+'/*');
	del(destFiles.fonts+'/*');
	del(destFiles.plugins+'/*');
	del(destFiles.controllers+'/*');
	done();
}

/* watch task */
function watchTask(){
	watch(srcFiles.snippets, series(snippetsTask, reload));
	watch(srcFiles.templates, series(templatesTask, reload));
	watch(srcFiles.blueprints, series(blueprintsTask, reload));
	watch('src/css/**/*', series(cssTask, reload));
	watch(srcFiles.js, series(jsTask, reload));
	watch(srcFiles.images, series(imagesTask, reload));
	watch(srcFiles.fonts, series(fontsTask, reload));
	watch(srcFiles.plugins, series(pluginsTask, reload));
	watch(srcFiles.controllers, series(controllersTask, reload));
}

// define public tasks

exports.snippets = snippetsTask;
exports.templates = templatesTask;
exports.blueprints = blueprintsTask;
exports.css = cssTask;
exports.js = jsTask;
exports.images = imagesTask;
exports.fonts = fontsTask;
exports.plugins = pluginsTask;
exports.controllers = controllersTask;

// Build task (manually build the project)
exports.build = series(
		unbuildTask,
		copyDependenciesTask, 
		snippetsTask, 
		templatesTask, 
		blueprintsTask, 
		cssTask, 
		jsTask, 
		imagesTask, 
		fontsTask, 
		pluginsTask,
		controllersTask
	);

// Unbuild task
exports.unbuild = unbuildTask;

// Default task = watch task
exports.default = parallel(serve, watchTask);