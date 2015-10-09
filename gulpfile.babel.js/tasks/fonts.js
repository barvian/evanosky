import gulp from 'gulp';
import size from 'gulp-size';
import {fonts as config} from '../config';

gulp.task('fonts', () => {
  return gulp.src(config.source)
    .pipe(gulp.dest(config.dest))
    .pipe(size({title: 'fonts'}));
});
