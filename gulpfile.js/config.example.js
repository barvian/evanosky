var bower = require('bower');

// Config
// ------

// Project paths
var src     = './assets/';
var tmp     = './tmp/';
var vendor  = './assets/scripts/vendor/';
var dist    = './public/';

module.exports = {
  sync: {
    user: 'USERNAME',
    host: 'DOMAIN.TLD',
    dest: '/path/to/destination/folder/',
    exclude_list: 'rsync-exclude.txt'
  },

  styles: {
    source: src+'styles/main.scss',
    includePaths: [bower.config.directory],
    tmp: tmp+'styles/',
    dest: dist+'styles/',
    autoprefixer: {
      browsers: ['> 5%', 'last 2 versions'],
      cascade: false
    }
  },

  jshint: {
    source: [src+'scripts/**/*.js', , '!'+vendor+'/**/*.js']
  },

  scripts: {
    name: 'main',
    source: [src+'scripts/**/*.js', '!'+vendor+'**/*.js'],
    dest: dist+'scripts/'
  },

  fonts: {
    source: src+'fonts/**/*',
    dest: dist+'fonts/'
  },

  images: {
    source: src+'images/**/*',
    dest: dist+'images/'
  },

  wiredep: {
    source: [vendor+'**/*.js', '!'+vendor+'modernizr*.*'],
    dest: dist+'scripts/'
  },

  clean: {
    all: [
      './.sass-cache',
      dist+'images/*',
      dist+'scripts/*',
      dist+'styles/*',
    ]
  },

  watch: {
    livereload: ['{assets,content,site}/**/*.{css,js,html,php}'],
    styles: src+'styles/**/*.scss',
    javascript: src+'scripts/**/*.js',
    vendor_javascript: vendor+'**/*.js',
    images: src+'images/**/*.*',
    bower: './bower.json'
  }
};
