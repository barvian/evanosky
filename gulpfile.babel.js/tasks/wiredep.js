import gulp from 'gulp';
import {wiredep as config} from '../config';
import rename from 'gulp-rename';
import uglify from 'gulp-uglify';
import concat from 'gulp-concat';
import wiredep from 'wiredep';

gulp.task('wiredep', () => {
  // Get Bower dependencies
  var packages  = wiredep(),
      js_files  = packages.js.concat(config.source);

  return gulp.src(js_files)
    .pipe(concat('vendor.js'))
    .pipe(uglify())
    .pipe(gulp.dest(config.dest));
});
