import gulp from 'gulp';
import {copy as config} from '../config';

gulp.task('copy', () => {
  return gulp.src(config.source, { base: config.base, dot: true })
    .pipe(gulp.dest(config.dest));
});
