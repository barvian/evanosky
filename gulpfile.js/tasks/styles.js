var gulp = require('gulp');
var config = require('../config').styles;
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css');
var sass = require('gulp-sass');
var size = require('gulp-size');
var gIf = require('gulp-if');
var pixrem = require('gulp-pixrem');

gulp.task('styles', function () {
  return gulp.src(config.source)
    .pipe(sourcemaps.init())
    .pipe(sass({
      includePaths: config.includePaths,
      precision: 10
    }).on('error', sass.logError))
    .pipe(autoprefixer(config.autoprefixer))
    .pipe(pixrem())
    // Concatenate and minify styles
    .pipe(gIf('*.css', minifyCSS()))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(config.dest))
    .pipe(size({title: 'styles'}));
});
