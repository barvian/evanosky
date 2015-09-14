var gulp = require('gulp');
var plumber = require('gulp-plumber');
var config = require('../config').scripts;
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var size = require('gulp-size');

gulp.task('scripts', function(){
  return gulp.src(config.source)
    .pipe(plumber())
    .pipe(concat(config.name + '.js'))
    .pipe(uglify({preserveComments: 'some'}))
    .pipe(gulp.dest(config.dest))
    .pipe(size({title: 'scripts'}));
});
