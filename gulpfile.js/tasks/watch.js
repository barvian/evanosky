import gulp from 'gulp';
import tasks from '../config';
import browserSync from 'browser-sync';

gulp.task('watch', () => {
  Object.keys(tasks).foreach(task => {
    const config = tasks[task];
    if (config.watchable) {
      const source = typeof config.watchable == 'string' || Array.isArray(config.watchable) ? config.watchable : config.source;
      gulp.watch(source, () => gulp.start(task));
    }
  });

  gulp.watch(tasks.browserSync.source, browserSync.reload);
});
