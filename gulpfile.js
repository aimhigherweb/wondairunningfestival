//Variables
var gulp = require('gulp');

var sass = require('gulp-sass');
var minifycss    = require('gulp-uglifycss');
var autoprefixer = require('gulp-autoprefixer'); 
var sourcemaps = require('gulp-sourcemaps');
const AUTOPREFIXER_BROWSERS = ['> 5%'];

var filter       = require('gulp-filter');
var replace = require('gulp-replace');
var replaceString = require('gulp-string-replace');

var browserSync = require('browser-sync').create();
var reload      = browserSync.reload;


//File Paths
var sassFiles = 'source/scss/**/*.scss',
    mainSassFile = 'source/scss/style.scss',
    cssFiles = '',
    sourceMaps = '/source/maps',
    localHostPath = '/wp-content/',
    remotePath = '/wp-content/',
    pathFiles ='*',
    files = './**/*.php';

//Compile main sass into css
gulp.task('sassy', function(){
  gulp.src(mainSassFile)
    .pipe(sourcemaps.init())
      .pipe(sass().on('error', sass.logError)) //Using gulp-sass

    .pipe(sourcemaps.write('/source/maps'))
      .pipe(gulp.dest(cssFiles))
});


//Watch for changes in sass files and running sass compile
gulp.task('watch', function() {
  // gulp.watch(files, reload);
  gulp.watch(sassFiles, ['sassy']);
});

//Browser sync watch for file changes
gulp.task( 'browser-sync', function() {
  browserSync.init( {
    proxy: 'http://owlkeyme.local',
    open: true,
    injectChanges: true,
  } );
});

//Replace file paths for local host with remote server
gulp.task('replaceLocalDev', function(){
  gulp.src([pathFiles, '!gulpfile.js'])
    .pipe(replace(localHostPath, remotePath))
    .pipe(gulp.dest('./'));

  gulp.src([sassFiles, '!gulpfile.js'])
    .pipe(replaceString(localHostPath, remotePath))
    .pipe(gulp.dest('source/scss/'));

  gulp.start('sassy');

  gulp.src( cssFiles )
  .pipe( filter( '*.css' ) )
  .pipe( minifycss( {
    maxLineLen: 10
  }))
  .pipe( gulp.dest( cssFiles ) )
});