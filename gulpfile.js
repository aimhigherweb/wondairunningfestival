require('dotenv').config()

const gulp = require('gulp')
const sass = require('gulp-dart-sass')
const sourcemaps = require('gulp-sourcemaps')
const replace = require('gulp-replace')
const browserSync = require('browser-sync').create()
const reload = browserSync.reload

//File Paths
const sassFiles = 'src/scss/**/*.scss',
	mainSassFile = 'src/scss/style.scss',
	cssFiles = '.',
	sourceMaps = '/src/maps',
	styleSheet = `/wp-content/themes/${process.env.THEME_NAME}/style.css`
currentDate = new Date().toISOString()

const sassy = () => {
	return gulp
		.src(mainSassFile)
		.pipe(sourcemaps.init())
		.pipe(sass().on('error', sass.logError))
		.pipe(sourcemaps.write(sourceMaps))
		.pipe(gulp.dest(cssFiles))
}

const watch = () => {
	browserSync.init({
		port: process.env.PORT || 3000,
		proxy: process.env.WP_URL,
		open: false,
	})

	gulp.watch(sassFiles, sassy)
	gulp.watch([
		'./*.php',
		'./layouts/**/*.php',
		'./partials/**/*.php',
		'./woocommerce/**/*.php',
		'./source/scss/**/*.scss',
	]).on('change', reload)
}

const styleVersion = () => {
	const thisVersion = styleSheet + '?v=' + currentDate

	return gulp
		.src(['header.php'])
		.pipe(replace(styleSheet, thisVersion))
		.pipe(gulp.dest('./'))
}

module.exports = {
  sassy,
  watch, 
  styleVersion
}