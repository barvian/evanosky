import $ from 'jquery';

// Multistep item
// ==============

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

  static defaultOptions = {
    progressButton: (item) => {
      return `<a>Next</a>`
    }
  }
}


// jQuery plugin
// -------------

$.fn.multistepItem = function(options) {
  return this.each(function() {
    new MultiStepItem(this, options);
  });
};


// Attribute bootstrap
// -------------------

$('[data-multistep-item]').each((index, item) => {
  new MultiStepItem(item, $(item).data('multistepItem'));
});


// Multistep
// =========

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

    this.$items = this.$el.find(this.options.itemSelector)
      .multistepItem($.extend({}, this.options, {
        progressButton: (item) => {
          return `<a class="btn btn--full btn--secondary btn--next">
              ${this.next(item) && this.next(item).$legend.text()}
            </a>`
        }
      }));
    this.items = this.$items
      .map(function() { return $(this).data('multistepItem') });
    this.$steps =
      this.$items.first().wrap(`<div class="${this.options.wrapperClass}" />`)
      .parent();
    this.$items.not(':first').appendTo(this.$steps);

    this.items.each((index, item) => {
      item.needsProgressButton = index != this.length-1;
      item.$el.toggleClass(this.options.inactiveClass, index != 0);
    });
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
    $(window).on('resize.multistep', (event) => {
      this.$steps.height('auto').height(this.$steps.height() + 2); // + 2 for borders
    }).trigger('resize');
  }

  _initNav() {
    this.$nav = $(`<nav class="${this.options.navClass}" />`);
    this.$navPrev = $(`<a class="${this.options.navPrevClass}"></a>`);

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
      wrapperClass: 'form__steps',
      itemSelector: '> fieldset',
      navClass: 'form__nav',
      navPrevClass: 'form__prev'
    };
  };
};


// jQuery plugin
// -------------

$.fn.multistep = function(options) {
  return this.each(function() {
    new MultiStep(this, options);
  });
};


// Attribute bootstrap
// -------------------

$(() => {
  $('[data-multistep]').each((index, form) => {
    new MultiStep(form, $(form).data('multistep'));
  });
});