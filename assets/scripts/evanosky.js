import pictureFill from 'picturefill';
import $ from 'jquery';
import appendAround from 'wsol-append-around';
import enquire from 'enquire';

$(function() {
  $('.js-aa').wsol_appendAround();

  // Donations
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

    Stripe.card.createToken($form, stripeResponseHandler.bind(this));
  });

  $('.js-form-amount').each(function(index) {
    const $form = $(this),
      $customOption = $form.find('input[name="amount"][value="custom"]'),
      $amounts = $form.find('input[name="amount"]').not($customOption),
      $custom = $form.find('input[id="custom"]');

    $custom.on({
      focus: function(event) {
        $form.addClass('has-choice');
        $(this).closest($form.find('> *')).addClass('has-focus').siblings().removeClass('has-focus');
      },
      input: function(event) {
        if ($(this).val().length > 0) {
          $form.addClass('has-choice');
          $customOption.prop('checked', true);  
        }
      }
    });

    $amounts.on({
      change: function(event) {
        $form.addClass('has-choice');
        $(this).closest($form.find('> *')).addClass('has-focus').siblings().removeClass('has-focus');
      }
    })
  });
});
