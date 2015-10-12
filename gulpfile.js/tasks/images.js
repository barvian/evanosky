import gulp from 'gulp';
import imagemin from 'gulp-imagemin';
import changed from 'gulp-changed';
import pngquant from 'imagemin-pngquant';
import {images as config} from '../config';
import size from 'gulp-size';

gulp.task('images', () => {
  return gulp.src(config.source)
    .pipe(changed(config.dest))
    .pipe(imagemin({
      progressive: true,
      interlaced: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [pngquant()]
    }))
    .pipe(gulp.dest(config.dest))
    .pipe(size({title: 'images'}));
});
