import $ from 'jquery';

/**
 * Amount input
 */
class InputCustom {
  constructor(el, options) {
    this.$el = $(el);
    this.el = el;

    this.options = $.extend({}, InputCustom.defaultOptions, options);
    this.$el.data("inputCustom", this);

    this.$choices = this.$el.find(this.options.choicesSelector);
    this.$customOption = this.$el.find(`input[name="${this.options.optionsGroup}"][value="${this.options.customOptionValue}"]`)
    this.$options = this.$el.find(`input[name="${this.options.optionsGroup}"]`).not(this.$customOption);
    this.$custom = this.$el.find(this.options.customSelector);

    this.listen();
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

        if ($target.val().length > 0) {
          this.$customOption.prop('checked', true);
        }
      },
      blur: (event) => {
        const $target = $(event.currentTarget);

        if ($target.val().length <= 0) {
          this.$el.removeClass('has-choice');
          $target.closest(this.$choices).removeClass(this.options.focusClass);
          this.$options.filter(':checked').trigger('change');
        } else {
          this.$customOption.prop('checked', true);
        }
      }
    });

    this.$options.on({
      change: (event) => {
        const $target = $(event.currentTarget);

        this.$el.addClass('has-choice');
        this.$choices.removeClass(this.options.focusClass);
        $target.closest(this.$choices).addClass(this.options.focusClass);
      }
    });
  }

  static get defaultOptions() {
    return {
      choicesSelector: '> *',
      focusClass: 'has-focus',
      optionsGroup: 'amount',
      customOptionValue: 'custom',
      customSelector: '#custom'
    };
  };
};

$.fn.inputCustom = function(options) {
  return this.each(function() {
    new InputCustom(this, options);
  });
};