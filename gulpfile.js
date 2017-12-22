//Variables
var gulp = require('gulp');
var sass = require('gulp-sass');
var replace = require('gulp-replace');
var replaceString = require('gulp-string-replace');
var sourcemaps = require('gulp-sourcemaps');

//File Paths
var sassFiles = 'source/scss/**/*.scss',
    mainSassFile = 'source/scss/style.scss',
    cssFiles = '',
    localHostPath = '/wondaicountryfestival/wp-content/',
    remotePath = '/wp-content/',
    pathFiles ='*'

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
  gulp.watch(sassFiles, ['sassy']);
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
});