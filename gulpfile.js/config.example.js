var bower = require('bower');

// Config
// ------

// Project paths
var src     = 'assets';
var tmp     = 'tmp';
var vendor  = 'assets/scripts/vendor';
var dist    = 'public';

module.exports = {
  sync: {
    user: 'USERNAME',
    host: 'DOMAIN.TLD',
    dest: '/path/to/destination/folder/',
    exclude_list: 'rsync-exclude.txt'
  },

  styles: {
    source: src+'/styles/main.scss',
    includePaths: [bower.config.directory],
    dest: dist+'/styles',
    autoprefixer: {
      browsers: ['> 5%', 'last 2 versions'],
      cascade: false
    }
  },

  jshint: {
    source: [src+'/scripts/**/*.js', , '!'+vendor+'/**/*.js']
  },

  scripts: {
    name: 'main',
    source: [src+'/scripts/**/*.js', '!'+vendor+'/**/*.js'],
    dest: dist+'/scripts'
  },

  copy: {
    base: src,
    source: [
      vendor+'/modernizr*.js'
    ],
    dest: dist
  },

  fonts: {
    source: src+'/fonts/**/*',
    dest: dist+'/fonts'
  },

  images: {
    source: src+'/images/**/*',
    dest: dist+'/images'
  },

  wiredep: {
    source: [vendor+'/**/*.js', '!'+vendor+'/modernizr*.js'],
    dest: dist+'/scripts'
  },

  clean: {
    all: [
      '.sass-cache/',
      dist,
    ]
  },

  watch: {
    livereload: ['{'+dist+',content,site}/**/*.{css,js,html,php,txt,png,svg,jpg,gif}'],
    styles: src+'/styles/**/*.scss',
    javascript: src+'/scripts/**/*.js',
    vendor_javascript: vendor+'/**/*.js',
    images: src+'/images/**/*.*',
    bower: 'bower.json'
  }
};
