import gulp from 'gulp';
import plumber from 'gulp-plumber';
import {jshint as config} from '../config';
import jshint from 'gulp-jshint';
import stylish from 'jshint-stylish';

//
// Check yo self before yo wreck yo self
//
gulp.task('lint', () => {
  return gulp.src(config.source)
    .pipe(plumber())
    .pipe(jshint())
    .pipe(jshint.reporter(stylish));
});
