import $ from 'jquery';

// Delayed input
// =============

class InputDelay {
  constructor(el, options) {
    this.$el = $(el);
    this.el = el;

    this.options = $.extend({}, InputDelay.defaultOptions, options);
    this.$el.data('inputDelay', this);

    this.listen();
  }

  _changeHandler(event) { // eslint-disable-line no-unused-vars
    // cancel previous timer
    if (this.timer) {
      clearTimeout(this.timer);
    }

    this.timer = setTimeout(() => {
      this.$el.trigger(`${this.options.on}Delay`, event);
    }, this.options.delay);
  }

  listen() {
    /* eslint-disable max-len */
    this.$el.on(`${this.options.on}.inputDelay`, event => this._changeHandler(event));
    /* eslint-enable max-len */
  }

  static defaultOptions = {
    on: 'input',
    callback: input => {}, // eslint-disable-line no-unused-vars
    delay: 400
  }
}

// jQuery plugin
// -------------

$.fn.inputDelay = function(options) {
  return this.each((index, input) => {
    new InputDelay(input, options); // eslint-disable-line no-new
  });
};

// Attribute bootstrap
// -------------------

$(() => {
  $('[data-input-delay]').each((index, input) => {
    new InputDelay(input, $(input).data('inputDelay')); // eslint-disable-line no-new
  });
});
