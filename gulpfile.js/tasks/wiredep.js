var gulp = require('gulp');
var config = require('../config').wiredep;
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var wiredep = require('wiredep');

gulp.task('wiredep', function(){
  // Get Bower dependencies
  var packages  = wiredep(),
      js_files  = packages.js.concat(config.source);
      
  return gulp.src(js_files)
    .pipe(concat('vendor.js'))
    .pipe(uglify())
    .pipe(gulp.dest(config.dest));
});
