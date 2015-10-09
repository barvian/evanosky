import gulp from 'gulp';
import {watch as config} from '../config';
import livereload from 'gulp-livereload';

gulp.task('watch', () => {
  livereload.listen();

  gulp.watch(config.livereload).on('change', livereload.changed);

  gulp.watch(config.styles, ['styles'] );
  gulp.watch(config.scripts, ['lint','scripts'] );
  gulp.watch(config.images, ['images'] );

  // only run the bower task when something has changed, might become a costly operation otherwise
  gulp.watch(config.vendor_javascript, ['wiredep']);
  gulp.watch(config.bower, ['wiredep']);
});
