<?php

return function($site, $pages, $page) {

  $error = false;

  // handle the form submission
  if(r::is('post') and get('donation')) {

    // Set your secret key: remember to change this to your live secret key in production
    // See your keys here https://dashboard.stripe.com/account/apikeys
    \Stripe\Stripe::setApiKey(yaml::read(detect::documentRoot() . DS . 'secrets.yml')['keys']['stripe']['secret']);

    // Get the credit card details submitted by the form
    $token = get('stripeToken');

    // Create the charge on Stripe's servers - this will charge the user's card
    try {
      $charge = \Stripe\Charge::create(array(
        "amount" => 50, // amount in cents, again
        "currency" => "usd",
        "source" => $token,
        "description" => "Example charge"
      ));
    } catch(\Stripe\Error\Card $e) {
      $error = $e;
    }

  }

  return array('error' => $error);

};
