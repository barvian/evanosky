import gulp from 'gulp';
import bower from 'bower';
import tasks from 'gulpfile';
import fs from 'fs';
import yaml from 'js-yaml';

const secrets = yaml.safeLoad(fs.readFileSync('./secrets.yml', 'utf8'));
const prod = secrets.servers.prod;

// Project paths
const src     = './assets';
const tmp     = './tmp';
const vendor  = `${src}/scripts/vendor`;
const dist    = './public';

gulp.tasks = tasks({
  deploy: {
    src: '.',
    username: prod.username,
    host: prod.host,
    dest: prod.root,
    excludeFirst: [
      '/site/accounts/*',
      '.DS_Store'
    ],
    include: [
      `${src}/`,
      `${src}/avatars/`,
      '/content/***',
      '/kirby/***',
      '/panel/***',
      `/${dist}/***`,
      '/site/***',
      '/thumbs/',
      '/.htaccess',
      '/index.php',
      '/secrets.yml'
    ],
    exclude: [
      '*', // everything not included
      `${src}/*`
    ],
    syncable: true
  },

  styles: {
    src: `${src}/styles/evanosky.scss`,
    all: `${src}/styles/**/*.scss`,
    includePaths: [bower.config.directory],
    dest:`${dist}/styles`,
    autoprefixer: {
      browsers: ['> 5%', 'last 2 versions'],
      cascade: false
    }
  },

  scripts: {
    src: `${src}/scripts/evanosky.js`,
    babelIgnore: new RegExp(`(${bower.config.directory})|(${vendor})`),
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

  clean: {
    target: [
      '.sass-cache/',
      dist,
    ]
  },

  watch: {
    needsReload: `{content,site}/**/*`,
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
