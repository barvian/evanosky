<header class="site-header <?php echo isset($class) ? $class : '' ?> <?php echo isset($mod) ? 'site-header--'.$mod : '' ?>" role="banner">
  <div class="hidden@site-nav-spread-up site-header__logo" data-set="site-logo">
    <a class="site-logo js-aa" href="<?php echo url() ?>">
      <img srcset="<?php echo url('public/images/logo.png') ?> 1x, <?php echo url('public/images/logo@2x.png') ?> 2x" alt="<?php echo $site->title()->html() ?>" />
    </a>
  </div>
  <button class="site-header__nav js-site-nav hidden@site-nav-spread-up">
    <?php snippet('sprite', array(
      'sprite' => 'menu'
    )) ?>
  </button>
  <?php snippet('site-nav') ?>
</header>