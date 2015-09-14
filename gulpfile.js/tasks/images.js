var gulp = require('gulp');
var config = require('../config').images;
var imagemin = require('gulp-imagemin');
var cache = require('gulp-cache');
var pngquant = require('imagemin-pngquant');

gulp.task('images', function () {
  return gulp.src(config.source)
    .pipe(cache(imagemin({
      progressive: true,
      interlaced: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [pngquant()]
    })))
    .pipe(gulp.dest(config.dest));
});
