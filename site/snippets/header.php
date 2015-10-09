<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Raleway:500,600" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic" rel="stylesheet" />
  <?php echo css('public/styles/evanosky.css') ?>
  <?php echo js('public/scripts/vendor/modernizr-custom.min.js') ?>

  <header class="site-header" role="banner">
    <a class="site-logo" href="<?php echo url() ?>">
      <img srcset="<?php echo url('public/images/logo.png') ?> 1x, <?php echo url('public/images/logo@2x.png') ?> 2x" alt="<?php echo $site->title()->html() ?>" />
    </a>
    <?php snippet('site-nav') ?>
  </header>
