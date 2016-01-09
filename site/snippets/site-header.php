<header class="site-header <?php echo isset($class) ? $class : '' ?> <?php echo isset($mod) ? 'site-header--'.$mod : '' ?>" role="banner">
  <button class="site-header__hamburger js-open-nav hidden@site-nav-spread">
    <?php snippet('sprite', [
      'sprite' => 'menu'
    ]) ?>
    <span>Menu</span>
  </button>
  <div class="hidden@site-nav-spread site-header__logo" data-set="site-logo">
    <a class="site-logo js-aa" href="<?php echo url() ?>">
      <img srcset="<?php echo url('public/images/logo.png') ?> 1x, <?php echo url('public/images/logo@2x.png') ?> 2x" alt="<?php echo $site->title()->html() ?>" />
    </a>
  </div>
  <div class="hidden@site-nav-spread site-header__search" data-set="site-search">
    <button class="site-search js-aa js-open-search">
      <span>Search</span>
      <?php snippet('sprite', [
        'sprite' => 'magnifying-glass'
      ]) ?>
    </button>
  </div>
  <?php snippet('site-nav') ?>
</header>