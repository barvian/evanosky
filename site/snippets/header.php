<!DOCTYPE html>
<html lang="en" class="page page--<?php e($page->isVisible(), 'visible', 'hidden') ?> page--<?php e($page->isHomePage(), 'home', $page->slug()) ?>">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Raleway:500,600" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic" rel="stylesheet" />
  <?php echo css('public/styles/evanosky.css') ?>
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script type="text/javascript">
    Stripe.setPublishableKey("<?php echo yaml::read(detect::documentRoot() . DS . 'secrets.yml')['keys']['stripe']['publishable'] ?>");
  </script>
  <?php echo js('public/scripts/vendor/modernizr-custom.min.js') ?>

  <div class="invisible"><?php echo file_get_contents(url('public/sprites.svg')) ?></div>
  <?php snippet('site-header') ?>