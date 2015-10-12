import bower from 'bower';

// Config
// ------

// Project paths
const src     = 'assets';
const tmp     = 'tmp';
const vendor  = `${src}/scripts/vendor`;
const dist    = 'public';

export default {
  sync: {
    user: 'USERNAME',
    host: 'DOMAIN.TLD',
    dest: '/path/to/destination/folder/',
    exclude_list: 'rsync-exclude.txt'
  },

  styles: {
    source: `${src}/styles/main.scss`,
    includePaths: [bower.config.directory],
    dest:`${dist}/styles`,
    autoprefixer: {
      browsers: ['> 5%', 'last 2 versions'],
      cascade: false
    },
    watchable: `${src}/styles/**/*.scss`
  },

  scripts: {
    source: [`${src}/scripts/**/*.js`, `!${vendor}/**/*.js`],
    dest: `${dist}/scripts`,
    name: 'main',
    watchable: true
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
    all: [
      '.sass-cache/',
      dist,
    ]
  },

  browserSync: {
    source: `{${dist},content,site}/**/*.{css,js,html,php,txt,png,svg,jpg,gif}`,
    notify: false,
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
};
