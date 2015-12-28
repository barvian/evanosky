import gulp from 'gulp';
import tasks from 'barvian-tasks';
import _bower from 'bower'; const bower = _bower.config.directory;
import path from 'path';
import fs from 'fs';
import yaml from 'js-yaml';

// Secrets
const {
  servers: {prod: prod}
} = yaml.safeLoad(fs.readFileSync('./secrets.yml', 'utf8'));

// Project paths
const src = 'assets';
const vendor = 'scripts/vendor';
const dest = 'public';

tasks(gulp, {
  browserSync: {
    files: ['content/**/*', 'site/**/*'],
    notify: true,
    scrollElementMapping: ['[role="main"]'],
    proxy: 'evanosky.dev',
    snippetOptions: {
      rule: {
        match: /<\/html>/i,
        fn: (snippet, match) => snippet + match
      }
    }
  },

  deploy: {
    type: 'rsync',
    src: '.',
    username: prod.username,
    host: prod.host,
    dest: prod.root,
    excludeFirst: [
      '/site/accounts/*',
      `/${dest}/avatars/*`,
      `/${dest}/thumbs/*`,
      '.DS_Store'
    ],
    // everything not already excluded
    include: [
      '/content/***',
      '/kirby/***',
      '/panel/***',
      `/${dest}/***`,
      '/site/***',
      '/vendor/***',
      '/.htaccess',
      '/index.php',
      '/site.php'
    ],
    // everything not included
    exclude: [
      '*'
    ],
    syncable: true
  },

  styles: {
    src: `${src}/styles/evanosky.scss`,
    all: [`${src}/styles/**/*.scss`, `${src}/variables.json`],
    includePaths: [bower],
    dest: `${dest}/styles`
  },

  scripts: {
    src: `${src}/scripts/evanosky.js`,
    all: [
      `${src}/scripts/**/*.js`,
      `!${src}/${vendor}/**/*`,
      path.basename(__filename)
    ],
    dest: `${dest}/scripts`,
    bundle: 'evanosky.js'
  },

  copy: {
    base: src,
    src: [
      `${vendor}/modernizr*.js`
    ],
    dest: dest
  },

  fonts: {
    src: `${src}/fonts/**/*`,
    dest: `${dest}/fonts`
  },

  images: {
    src: `${src}/images/**/*`,
    dest: `${dest}/images`
  },

  sprites: {
    src: `${src}/sprites/**/*`,
    dest: dest
  }
});
