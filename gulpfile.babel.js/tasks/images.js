import gulp from 'gulp';
import imagemin from 'gulp-imagemin';
import cache from 'gulp-cache';
import pngquant from 'imagemin-pngquant';
import {images as config} from '../config';

gulp.task('images', () => {
  return gulp.src(config.source)
    .pipe(cache(imagemin({
      progressive: true,
      interlaced: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [pngquant()]
    })))
    .pipe(gulp.dest(config.dest));
});
