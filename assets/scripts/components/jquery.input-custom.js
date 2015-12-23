import $ from 'jquery';

// Custom Input
// ============

class InputCustom {
  constructor(el, options) {
    this.$el = $(el);
    this.el = el;

    this.options = $.extend({}, InputCustom.defaultOptions, options);
    const {
      choicesSelector, optionsGroup, customSelector, customOptionValue, focusClass
    } = this.options;
    this.$el.data('inputCustom', this);

    this.$choices = this.$el.find(choicesSelector);
    this.$_items = this.$el.find(`input[name="${optionsGroup}"]`);
    this.$customOption = this.$_items.filter(`[value="${customOptionValue}"]`);
    this.$options = this.$_items.not(this.$customOption);
    this.$custom = this.$el.find(customSelector);

    if (this.$options.filter(':checked').length > 0) {
      this.$el.addClass('has-choice');
      this.$options.closest(this.$choices).addClass(focusClass);
      this._value = this.$options.filter(':checked').val();
    } else if (this.$customOption.is(':checked')) {
      this.$el.addClass('has-choice');
      this.$custom.closest(this.$choices).addClass(focusClass);
      this._value = this.$custom.val();
    }

    this.listen();
  }

  get value() {
    return this._value;
  }

  listen() {
    this.$custom.on({
      focus: (event) => {
        const $target = $(event.currentTarget);

        this.$el.addClass('has-choice');
        this.$choices.removeClass(this.options.focusClass);
        $target.closest(this.$choices).addClass(this.options.focusClass);
      },
      input: (event) => {
        const $target = $(event.currentTarget);

        this._value = $target.val();
        this.$el.trigger('change.inputCustom');
        if ($target.val().length > 0) {
          this.$customOption.prop('checked', true);
        }
      },
      blur: (event) => {
        const $target = $(event.currentTarget);

        if ($target.val().length <= 0 || $target.val() === 0) {
          this.$el.removeClass('has-choice');
          $target.closest(this.$choices).removeClass(this.options.focusClass);
          this.$options.filter(':checked').trigger('change');
        } else {
          this.$customOption.prop('checked', true);
          this._value = $target.val();
          this.$el.trigger('change.inputCustom');
        }
      }
    });

    this.$options.on({
      change: (event) => {
        const $target = $(event.currentTarget);

        this._value = $target.val();
        this.$el.trigger('change.inputCustom', [$target.val()]).addClass('has-choice');
        this.$choices.removeClass(this.options.focusClass);
        $target.closest(this.$choices).addClass(this.options.focusClass);
      }
    });
  }

  // jshint ignore:start
  static defaultOptions = {
    choicesSelector: '> *',
    focusClass: 'has-focus',
    optionsGroup: 'amount',
    customOptionValue: 'custom',
    customSelector: '#custom'
  }
  // jshint ignore:end
}

// jQuery plugin
// -------------

$.fn.inputCustom = function(options) {
  return this.each((index, input) => {
    new InputCustom(input, options);
  });
};

// Attribute bootstrap
// -------------------

$(() => {
  $('[data-input-custom]').each((index, input) => {
    new InputCustom(input, $(input).data('inputCustom'));
  });
});
