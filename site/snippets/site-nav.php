<nav class="site-nav" role="navigation">
  <?php $count = $pages->visible()->count() ?>
  <ul class="site-nav__menu"><?php snippet('site-nav-menu-items', ['pages' => $pages->visible()->limit(ceil($count/2))]) ?></ul>
  <div class="site-nav__logo visible@alpha" data-set="site-logo"></div>
  <ul class="site-nav__menu">
    <?php snippet('site-nav-menu-items', ['pages' => $pages->visible()->offset(ceil($count/2))]) ?>
    <li class="site-nav__search visible@site-nav-spread" data-set="site-search">
    </li>
  </ul>
  <a class="site-nav__close js-close-nav hidden@site-nav-spread">
    <?php snippet('sprite', [
      'sprite' => 'cross-thin'
    ]) ?>
  </a>
</nav>