import gulp from 'gulp';
import bower from 'bower';
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
const dist    = 'public';

gulpfile(gulp, {
  deploy: {
    src: '.',
    username: prod.username,
    host: prod.host,
    dest: prod.root,
    excludeFirst: [
      '/site/accounts/*',
      `/${dist}/avatars/*`,
      `/${dist}/thumbs/*`,
      '.DS_Store'
    ],
    include: [ // everything not already excluded
      '/content/***',
      '/kirby/***',
      '/panel/***',
      `/${dist}/***`,
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
    includePaths: [bower.config.directory],
    dest:`${dist}/styles`,
    autoprefixer: {
      browsers: ['> 5%', 'last 2 versions'],
      cascade: false
    }
  },

  scripts: {
    src: `${src}/scripts/evanosky.js`,
    dest: `${dist}/scripts`,
    bundle: 'evanosky',
  },

  copy: {
    base: src,
    src: [
      `${vendor}/modernizr*.js`
    ],
    dest: dist,
  },

  fonts: {
    src: `${src}/fonts/**/*`,
    dest: `${dist}/fonts`
  },

  images: {
    src: `${src}/images/**/*`,
    dest: `${dist}/images`,
  },

  sprites: {
    src: `${src}/sprites/**/*`,
    dest: dist
  },

  clean: [
  ],

  watch: {
    promptsReload: `{content,site}/**/*`,
    browserSync: {
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
    }
  }
});
