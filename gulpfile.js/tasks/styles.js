var gulp = require('gulp');
var config = require('../config').styles;
var sourcemaps = require('gulp-sourcemaps');
var newer = require('gulp-newer');
var autoprefixer = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css');
var sass = require('gulp-sass');
var size = require('gulp-size');
var gIf = require('gulp-if');

gulp.task('styles', function () {
  return gulp.src(config.source)
    .pipe(newer({dest: config.tmp, ext: '.css'}))
    .pipe(sourcemaps.init())
    .pipe(sass({
      precision: 10
    }).on('error', sass.logError))
    .pipe(autoprefixer(config.autoprefixer))
    .pipe(gulp.dest(config.dest))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(config.tmp))
    // Concatenate and minify styles
    .pipe(gIf('*.css', minifyCSS()))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(config.dest))
    .pipe(size({title: 'styles'}));
});
