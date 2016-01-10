<header class="site-header <?php echo isset($class) ? $class : '' ?> <?php echo isset($mod) ? 'site-header--'.$mod : '' ?>" role="banner">
  <button class="site-header__hamburger js-open-nav hidden@site-nav-spread">
    <?php snippet('sprite', [
      'sprite' => 'menu'
    ]) ?>
    <span>Menu</span>
  </button>
  <div class="hidden@site-nav-spread site-header__logo" data-set="site-logo"></div>
  <div class="hidden@site-nav-spread site-header__search" data-set="site-search"></div>
  <?php snippet('site-nav') ?>
  <?php snippet('site-search') ?>
</header>