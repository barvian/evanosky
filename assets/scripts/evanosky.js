import {breakpoints} from '../variables';
import pictureFill from 'picturefill';
import $ from 'jquery';
import inputCustom from './jquery.input-custom';
import multistep from './jquery.multistep';
import payment from 'jquery.payment';
import appendAround from 'wsol-append-around';
import enquire from 'enquire';

$(function() {
  $('.js-aa').wsol_appendAround();
  $('.js-site-nav').on('click', function(event) {
    $('html, body').toggleClass('has-open-nav').animate({ scrollTop: 0 }, 150);
    $('.site-nav').css('top', $('.site-header').height());
  });

  // Queries
  enquire.register(breakpoints['site-nav-spread'], {
    match: () => {
      $('body').removeClass('has-open-nav');
    },
    unmatch: () => {

    }
  });

  // Forms
  $('input.cc-numeric').payment('restrictNumeric');
  $('input.cc-number').payment('formatCardNumber');
  $('input.cc-exp').payment('formatCardExpiry');
  $('input.cc-cvc').payment('formatCardCVC');

  $('.js-form-amount').inputCustom();
  $('.js-multistep').multistep();


  const stripeResponseHandler = function(status, response) {
    const $form = $(this);

    if (response.error) {
      // Show the errors on the form
      $form.find('.form__errors').text(response.error.message);
      $form.find('[type="submit"]').prop('disabled', false);
    } else {
      // response contains id and card, which contains additional card details
      var token = response.id;
      // Insert the token into the form so it gets submitted to the server
      $form.append($('<input type="hidden" name="stripeToken" />').val(token));
      // and submit
      $form.get(0).submit();
    }
  };

  $('.js-stripe').submit(function(event) {
    event.preventDefault(); // don't submit

    const $form = $(this);

    // Disable the submit button to prevent repeated clicks
    $form.find('[type="submit"]').prop('disabled', true);

    const expiration = $form.find('.cc-exp').payment('cardExpiryVal');
    Stripe.card.createToken({
      number: $form.find('.cc-number').val(),
      cvc: $form.find('.cc-cvc').val(),
      exp_month: (expiration.month || 0),
      exp_year: (expiration.year || 0)
    }, stripeResponseHandler.bind(this));
  });
});
