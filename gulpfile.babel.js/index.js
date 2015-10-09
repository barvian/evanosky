// Gulpfile
// --------

import gulp from 'gulp';
import * as tasks from './tasks';

gulp.task('build', ['lint','images','fonts','styles','wiredep','scripts','copy']);
gulp.task('default', ['build','watch']);
