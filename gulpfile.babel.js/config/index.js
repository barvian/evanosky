import bower from 'bower';
import sync from './sync';

// Config
// ======

// Project paths
const src     = 'assets';
const tmp     = 'tmp';
const vendor  = `${src}/scripts/vendor`;
const dist    = 'public';

export default Object.assign({}, {
  styles: {
    source: `${src}/styles/evanosky.scss`,
    includePaths: [bower.config.directory],
    dest:`${dist}/styles`,
    autoprefixer: {
      browsers: ['> 5%', 'last 2 versions'],
      cascade: false
    },
    watchable: `${src}/styles/**/*.scss`
  },

  scripts: {
    source: `${src}/scripts/evanosky.js`,
    babelIgnore: new RegExp(`(${bower.config.directory})|(${vendor})`),
    dest: `${dist}/scripts`,
    bundle: 'evanosky',
  },

  copy: {
    base: src,
    source: [
      `${vendor}/modernizr*.js`
    ],
    dest: dist,
    watchable: true
  },

  fonts: {
    source: `${src}/fonts/**/*`,
    dest: `${dist}/fonts`
  },

  images: {
    source: `${src}/images/**/*`,
    dest: `${dist}/images`,
    watchable: true
  },

  clean: {
    source: [
      '.sass-cache/',
      dist,
    ]
  },

  browserSync: {
    needsReload: `{content,site}/**/*`,
    config: {
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
}, {sync: sync});
