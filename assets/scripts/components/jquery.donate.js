import $ from 'jquery';
import multistep from './jquery.multistep';
import payment from 'jquery.payment';

// Donation form
// =============

class DonationForm {
  constructor(el, options) {
    this.$el = $(el).multistep();
    this.el = el;

    this.options = $.extend({}, DonationForm.defaultOptions, options);
    this.$el.data("donate", this);

    this.$errors = this.$el.find(this.options.errorsSelector);
    this.$amount = this.$el.find(this.options.amountSelector).inputCustom();
    this.amount = this.$amount.data('inputCustom');
    this.amount.$custom.payment('restrictNumeric');
    this.$zip = this.$el.find(this.options.zipSelector);
    this.$ccNumber = this.$el.find(this.options.ccNumberSelector).payment('formatCardNumber');
    this.$ccExpiry = this.$el.find(this.options.ccExpirySelector).payment('formatCardExpiry');
    this.$ccCVC = this.$el.find(this.options.ccCVCSelector).payment('formatCardCVC');

    this._initSubmitButton();

    this.listen();
  }

  _initSubmitButton() {
    this.$submit = $(this.options.submitButton(this.amount.value))
      .appendTo(this.$el.data('multistep').$items.last());
  }

  _refreshSubmitButton() {
    this.$submit.html($(this.options.submitButton(this.amount.value)).html());
  }

  listen() {
    this.$el.submit((event) => {
      event.preventDefault(); // don't submit

      this.submit();
    });

    this.$amount.on('change.inputCustom', (event) => {
      this._refreshSubmitButton();
    });
  }

  _stripeResponseHandler(status, response) {
    if (response.error) {
      // Show the errors on the form
      this.$errors.text(response.error.message);
      this.$submit.prop('disabled', false);
    } else {
      // response contains id and card, which contains additional card details
      var token = response.id;
      // Insert the token into the form so it gets submitted to the server
      this.$el.append($('<input type="hidden" name="stripeToken" />').val(token));
      // and submit
      this.$el.get(0).submit();
    }
  }

  submit() {
    // Disable the submit button to prevent repeated clicks
    this.$submit.prop('disabled', true);

    const expiration = this.$ccExpiry.payment('cardExpiryVal');
    Stripe.card.createToken({
      number: this.$ccNumber.val(),
      cvc: this.$ccCVC.val(),
      exp_month: (expiration.month || 0),
      exp_year: (expiration.year || 0),
      address_zip: this.$zip.val(),
    }, this._stripeResponseHandler.bind(this));
  }

  static get defaultOptions() {
    return {
      errorsSelector: '.form__errors',
      submitSelector: '[type="submit"]',
      amountSelector: '.form__choices',
      zipSelector: '#zip',
      ccNumberSelector: '#cc-number',
      ccExpirySelector: '#cc-expiry',
      ccCVCSelector: '#cc-cvc',
      submitButton: (val = null) => {
        return `<button type="submit" class="btn btn--full btn--primary">
            Donate${val == '' || val == null ? '' : ' $'+val}
          </button>`
      }
    };
  };
};

// jQuery plugin
// -------------

$.fn.donate = function(options) {
  return this.each((index, input) => {
    new DonationForm(input, options);
  });
};


// Attribute bootstrap
// -------------------

$(() => {
  $('[data-donate]').each((index, form) => {
    new DonationForm(form, $(form).data('donate'));
  });
});