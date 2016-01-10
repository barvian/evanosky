import $ from 'jquery';

// Overlay search
// ==============

class OverlaySearch {
  constructor(el, options) {
    this.$el = $(el);
    this.el = el;

    this.options = $.extend({}, OverlaySearch.defaultOptions, options);
    this.$el.data('overlaySearch', this);

    /* eslint-disable max-len */
    this.$field = this.$el.find(this.options.fieldSelector).inputDelay();
    this.$results = this.$el.find(this.options.resultsSelector);
    /* eslint-enable max-len */

    this.listen();
  }

  autocomplete() {
    $.get('/search/', {q: this.$field.val(), ajax: true}, response => {
      this.$results.html(response);
    });
  }

  listen() {
    this.$field.on('inputDelay', event => this.autocomplete(event));
  }

  static defaultOptions = {
    fieldSelector: '.site-search__field',
    resultsSelector: '.site-search__items'
  }
}

// jQuery plugin
// -------------

$.fn.overlaySearch = function(options) {
  return this.each((index, input) => {
    new OverlaySearch(input, options); // eslint-disable-line no-new
  });
};

// Attribute bootstrap
// -------------------

$(() => {
  $('[data-overlay-search]').each((index, input) => {
    new OverlaySearch(input, $(input).data('overlaySearch')); // eslint-disable-line no-new
  });
});
