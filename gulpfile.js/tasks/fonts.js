var gulp = require('gulp');
var config = require('../config').fonts;
var size = require('gulp-size');

gulp.task('fonts', function() {
  return gulp.src(config.source)
    .pipe(gulp.dest(config.dest))
    .pipe(size({title: 'fonts'}));
});
