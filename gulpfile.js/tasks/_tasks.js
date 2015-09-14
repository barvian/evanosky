var gulp = require('gulp');

gulp.task('build', ['lint','images','fonts','styles','wiredep','scripts']);
gulp.task('default', ['build','watch']);
