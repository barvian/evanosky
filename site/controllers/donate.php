<?php

return function($site, $pages, $page) {

  $error = false;

  // handle the form submission
  if(r::is('post') and get('donation')) {

    $amount = get('amount');
    if($amount) {
      if($amount == 'custom') $amount = get('custom');
      if(is_numeric($amount)) {
        $amount = (float) $amount;
      } else {
        $error = 'Please enter a valid number for the donation amount.';
      }
    } else {
      $error = 'Please specify an amount for the donation.';
    }

    if (!$error) {
      // Set your secret key: remember to change this to your live secret key in production
      // See your keys here https://dashboard.stripe.com/account/apikeys
      \Stripe\Stripe::setApiKey(yaml::read(detect::documentRoot() . DS . 'secrets.yml')['keys']['stripe']['secret']);

      // Get the credit card details submitted by the form
      $token = get('stripeToken');

      // Create the charge on Stripe's servers - this will charge the user's card
      try {
        $charge = \Stripe\Charge::create(array(
          "amount" => $amount * 100, // amount in cents, again
          "currency" => "usd",
          "source" => $token,
          "description" => "Example charge"
        ));

        go('donated');
      } catch(\Stripe\Error\Card $e) {
        $error = $e->getMessage();
      }
    }

  }

  return array('error' => $error);

};
