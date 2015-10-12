import gulp from 'gulp';
import {styles as config} from '../config';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'gulp-autoprefixer';
import minifyCSS from 'gulp-minify-css';
import sass from 'gulp-sass';
import size from 'gulp-size';
import gIf from 'gulp-if';
import pixrem from 'gulp-pixrem';

gulp.task('styles', () => {
  return gulp.src(config.source)
    .pipe(sourcemaps.init())
    .pipe(sass({
      includePaths: config.includePaths,
      precision: 10
    }).on('error', sass.logError))
    .pipe(autoprefixer(config.autoprefixer))
    .pipe(pixrem())
    // Concatenate and minify styles
    .pipe(gIf('*.css', minifyCSS()))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(config.dest))
    .pipe(size({title: 'styles'}));
});
