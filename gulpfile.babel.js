import gulp from 'gulp';
import _bower from 'bower'; const bower = _bower.config.directory;
import gulpfile from 'gulpfile';
import fs from 'fs';
import yaml from 'js-yaml';

// Secrets
const {
  servers: { prod: prod }
} = yaml.safeLoad(fs.readFileSync('./secrets.yml', 'utf8'));

// Project paths
const src     = 'assets';
const tmp     = 'tmp';
const vendor  = 'scripts/vendor';
const dest    = 'public';

gulpfile(gulp, {
  browserSync: {
    files: ['content/**/*', 'site/**/*'],
    notify: true,
    logPrefix: 'Evanosky',
    scrollElementMapping: ['[role="main"]'],
    proxy: 'evanosky.dev',
    snippetOptions: {
      rule: {
        match: /<\/html>/i,
        fn: function (snippet, match) {
          return snippet + match;
        }
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
    include: [ // everything not already excluded
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
    exclude: [
      '*' // everything not included
    ],
    syncable: true
  },

  styles: {
    src: `${src}/styles/evanosky.scss`,
    all: [`${src}/styles/**/*.scss`, `${src}/variables.json`],
    includePaths: [bower],
    dest:`${dest}/styles`,
    autoprefixer: {
      browsers: ['> 5%', 'last 2 versions'],
      cascade: false
    }
  },

  scripts: {
    src: `${src}/scripts/evanosky.js`,
    dest: `${dest}/scripts`,
    bundle: 'evanosky.js'
  },

  copy: {
    base: src,
    src: [
      `${vendor}/modernizr*.js`
    ],
    dest: dest,
  },

  fonts: {
    src: `${src}/fonts/**/*`,
    dest: `${dest}/fonts`
  },

  images: {
    src: `${src}/images/**/*`,
    dest: `${dest}/images`,
  },

  sprites: {
    src: `${src}/sprites/**/*`,
    dest: dest
  }
});
