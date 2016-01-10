<nav class="site-nav" role="navigation">
  <?php $count = $pages->visible()->count() ?>
  <ul class="site-nav__menu"><?php snippet('site-nav-menu-items', ['pages' => $pages->visible()->limit(ceil($count/2))]) ?></ul>
  <div class="site-nav__logo visible@site-nav-spread" data-set="site-logo">
    <a class="site-logo js-aa" href="<?php echo url() ?>">
      <img srcset="<?php echo url('public/images/logo.png') ?> 1x, <?php echo url('public/images/logo@2x.png') ?> 2x" alt="<?php echo $site->title()->html() ?>" />
    </a>
  </div>
  <ul class="site-nav__menu">
    <?php snippet('site-nav-menu-items', ['pages' => $pages->visible()->offset(ceil($count/2))]) ?>
    <li class="site-nav__search visible@site-nav-spread" data-set="site-search">
      <a class="js-aa js-open-search" href="/search/">
        <span>Search</span>
        <?php snippet('sprite', [
          'sprite' => 'magnifying-glass'
        ]) ?>
      </a>
    </li>
  </ul>
  <button class="site-nav__close js-close-nav hidden@site-nav-spread">
    <?php snippet('sprite', [
      'sprite' => 'cross-thin'
    ]) ?>
  </button>
</nav>