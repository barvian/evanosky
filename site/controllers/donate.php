<?php

return function($site, $pages, $page) {

  $completed = false;
  $error = false;

  // handle the form submission
  if(r::is('post') and get('donation')) {
    $amount = get('amount');
    if($amount) {
      if($amount == 'custom') $amount = get('customInt');
      if(is_numeric($amount)) {
        $amount = (float) $amount;
      } else {
        $error = 'Please enter a valid number for the donation amount.'; goto errored;
      }
    } else {
      $error = 'Please specify an amount for the donation.'; goto errored;
    }

    $name = get('name');
    if(!$name) {
      $error = 'Name is required.'; goto errored;
    }
    $email = get('email');
    if(!$email) {
      $error = 'Email is required.'; goto errored;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = 'Please enter a valid email.'; goto errored;
    }
    $address = get('address');
    if(!$address) {
      $error = 'Address is required.'; goto errored;
    }
    $city = get('city');
    if(!$city) {
      $error = 'City is required.'; goto errored;
    }
    $state = get('state');
    if(!$state) {
      $error = 'State is required.'; goto errored;
    }
    $zip = get('zip');
    if(!$zip) {
      $error = 'ZIP is required.'; goto errored;
    }

    \Stripe\Stripe::setApiKey(yaml::read(detect::documentRoot() . DS . 'secrets.yml')['keys']['stripe']['secret']);

    // Get the credit card details submitted by the form
    $token = get('stripeToken');

    try {
      $customer = \Stripe\Customer::create([
        "source" => $token,
        "email" => $email,
        "metadata" => [
          "name" => $name,
          "address" => $address,
          "city" => $city,
          "state" => strtoupper($state),
          "zip" => $zip
        ]
      ]);
      $charge = \Stripe\Charge::create([
        "amount" => $amount * 100,
        "currency" => "usd",
        "customer" => $customer->id,
        "description" => "Web donation",
        "receipt_email" => $email
      ]);

      $completed = true;
    } catch(\Stripe\Error\Card $e) {
      $error = $e->getMessage(); goto errored;
    } catch(\Stripe\Error\InvalidRequest $e) {
      $error = $e->getMessage(); goto errored;
    }
  }

  errored:
  return [
    'error' => $error,
    'completed' => $completed
  ];

};
