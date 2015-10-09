import gulp from 'gulp';
import plumber from 'gulp-plumber';
import {scripts as config} from '../config';
import uglify from 'gulp-uglify';
import concat from 'gulp-concat';
import size from 'gulp-size';
import babel from 'gulp-babel';

gulp.task('scripts', () => {
  return gulp.src(config.source)
    .pipe(plumber())
    .pipe(babel())
    .pipe(concat(config.name + '.js'))
    .pipe(uglify({preserveComments: 'some'}))
    .pipe(gulp.dest(config.dest))
    .pipe(size({title: 'scripts'}));
});
