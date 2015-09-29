var gulp = require('gulp');
var config = require('../config').copy;

gulp.task('copy', function() {
  return gulp.src(config.source, { base: config.base, dot: true })
    .pipe(gulp.dest(config.dest));
});
