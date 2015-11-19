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

    this.$steps = this.$el.find(this.options.stepsSelector);
    this.$items = this.$steps.find(this.options.itemSelector)
      .multistepItem($.extend({}, this.options, {
        progressButton: (item) => {
          return `<button class="btn btn--full btn--secondary btn--next">
              ${this.next(item) && this.next(item).$legend.text()}
            </button>`
        }
      }));
    this.items = this.$items
      .map(function() { return $(this).data('multistepItem') });

    this.items.each((index, item) => {
      item.needsProgressButton = index != this.length-1;
      item.$el.toggleClass(this.options.inactiveClass, index != 0);
    });
    this.$steps.height(this.$steps.height() + 2);
    this.active = this.items.get(0);

    this._initNav();

    this.listen();
  }

  get length() {
    return this.items.length;
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

  _initNav() {
    this.$nav = $(`<nav class="${this.options.navClass}" />`);
    this.$navPrev = $(`<button class="${this.options.navPrevClass}"></button>`);

    this.$nav.append(this.$navPrev);
    this.$steps.before(this.$nav);

    this._refreshNav();
  }

  _refreshNav() {
    if (this.hasPrev()) {
      this.$navPrev.removeClass(this.options.inactiveClass).text(this.prev().$legend.text());
    } else {
      this.$navPrev.addClass(this.options.inactiveClass);
    }
  }

  goTo(index) {
    if (index == null) return;
    const next = typeof index == 'object' ? index : this.items.get(index);
    const animatingClass = this.items.index(this.active) < this.items.index(next)
      ? this.options.animatingForwardClass
      : this.options.animatingBackwardClass;

    this.active.$el.addClass(this.options.inactiveClass);
    next.$el.removeClass(this.options.inactiveClass);
    this.active.$el.add(next.$el).add(this.$steps)
      .removeClass(this.options.animatingForwardClass)
      .removeClass(this.options.animatingBackwardClass)
      .addClass(animatingClass)
      .one('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', (event) => {
        $(event.currentTarget).removeClass(animatingClass);
      });

    const heightDiff = next.$el.height() - this.active.$el.height();
    this.$steps.height(this.$steps.height() + heightDiff);

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
      animatingForwardClass: 'is-animating-forward',
      animatingBackwardClass: 'is-animating-backward',
      inactiveClass: 'is-inactive',
      stepsSelector: '.form__steps',
      itemSelector: '> fieldset',
      navClass: 'form__nav',
      navPrevClass: 'form__prev'
    };
  };
};

$.fn.multistep = function(options) {
  return this.each(function() {
    new MultiStep(this, options);
  });
};