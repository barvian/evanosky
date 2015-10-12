import gulp from 'gulp';
import {watch as config} from '../config';
import browserSync from 'browser-sync';

gulp.task('watch', () => {
  browserSync({
    notify: false,
    // Customize the Browsersync console logging prefix
    logPrefix: 'Evanosky',
    // Allow scroll syncing across breakpoints
    scrollElementMapping: ['[role="main"]'],
    // Run as an https by uncommenting 'https: true'
    // Note: this uses an unsigned certificate which on first access
    //       will present a certificate warning in the browser.
    // https: true,
    proxy: 'evanosky.dev',
    snippetOptions: {
      rule: {
        match: /<\/html>/i,
        fn: function (snippet, match) {
          return snippet + match;
        }
      }
    }
  });

  for (let [key, value] of Dict.entries(myObj)) {
     // do something with key|value
  }

  gulp.watch(config.browserSync, browserSync.reload);

  gulp.watch(config.styles, ['styles'] );
  gulp.watch(config.scripts, ['lint','scripts'] );
  gulp.watch(config.images, ['images'] );

  // only run the bower task when something has changed, might become a costly operation otherwise
  gulp.watch(config.vendor_javascript, ['wiredep']);
  gulp.watch(config.bower, ['wiredep']);
});
