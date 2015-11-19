import $ from 'jquery';

/**
 * MultiStep Item
 */
class MultiStepItem {
  constructor(el, options) {
    this.$el = $(el);
    this.el = el;

    this.options = $.extend({}, MultiStepItem.defaultOptions, options);
    this.$el.data("multistepItem", this);

    this.$legend = this.$el.find('> legend');

    this._initProgressButton();
  }

  get needsProgressButton() {
    if (this._needsProgressButton == null) this._needsProgressButton = false;
    return this._needsProgressButton;
  }

  set needsProgressButton(value) {
    this._needsProgressButton = value;
    this._initProgressButton();
  }

  _initProgressButton() {
    if (this.needsProgressButton) {
      if (this.$progressButton) this.$progressButton.remove();
      this.$progressButton = $(this.options.progressButton(this))
        .appendTo(this.$el)
        .on('click', (event) => {
          event.preventDefault();

          this.$el.trigger('progress.multistep', [this]);
        });
    }
  }

  static get defaultOptions() {
    return {
      progressButton: (item) => {
        return `<button>Next</button>`
      }
    };
  };
};

$.fn.multistepItem = function(options) {
  return this.each(function() {
    new MultiStepItem(this, options);
  });
};

/**
 * MultiStep
 */
class MultiStep {
  constructor(el, options) {
    this.$el = $(el);
    this.el = el;

    this.options = $.extend(
      {},
      MultiStepItem.defaultOptions,
      MultiStep.defaultOptions,
      options);
    this.$el.data("multistep", this);

    this.$nav = this.$el.find(this.options.navSelector);
    this.$navPrev = this.$el.find(this.options.navPrevSelector);

    this.$items = this.$el.find(this.options.itemSelector)
      .multistepItem($.extend({}, this.options, {
        progressButton: (item) => {
          return `<button class="btn btn--full btn--secondary btn--next">
              ${this.next(item) && this.next(item).$legend.text()}
            </button>`
        }
      }));
    this.items = this.$items
      .map(function() { return $(this).data('multistepItem') });

    const length = this.items.length;
    this.items.each(function(index) { this.needsProgressButton = index != length-1; });
    this.active = this.items.get(0);

    this.listen();
  }

  listen() {
    this.$navPrev.on('click', (event) => {
      event.preventDefault();
      
      this.goTo(this.prev());
    });
    this.$items.on('progress.multistep', (event, item) => {
      this.goTo(this.next(item));
    });
  }

  _refreshNav() {
    if (this.hasPrev(this.active)) {
      this.$navPrev.text(this.prev().$legend.text());
    } else {
      this.$navPrev.html('');
    }
  }

  goTo(index) {
    if (index == null) return;
    const next = typeof index == 'object' ? index : this.items.get(index);

    this.active.$el.addClass('hidden');
    next.$el.removeClass('hidden');

    this.active = next;
    this._refreshNav();
  }

  hasPrev(item = this.active) {
    if (this.items == null) return false;

    const i = this.items.index(item);
    return i !== -1 && i - 1 >= 0;
  }

  prev(item = this.active) {
    return this.hasPrev(item) ? this.items.get(this.items.index(item) - 1) : null;
  }

  hasNext(item = this.active) {
    if (this.items == null) return false;

    const i = this.items.index(item);
    return i !== -1 && i + 1 <= this.items.length;
  }

  next(item = this.active) {
    return this.hasNext(item) ? this.items.get(this.items.index(item) + 1) : null;
  }

  static get defaultOptions() {
    return {
      itemSelector: '> fieldset',
      navSelector: '.form__nav',
      navPrevSelector: '.form__prev'
    };
  };
};

$.fn.multistep = function(options) {
  return this.each(function() {
    new MultiStep(this, options);
  });
};