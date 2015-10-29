<nav class="site-nav" role="navigation">
  <?php $count = $pages->visible()->count() ?>
  <ul class="site-nav__menu">
  <?php foreach($pages->visible()->limit(ceil($count/2)) as $page): ?>
    <?php snippet('site-nav-item', array('page' => $page)) ?>
  <?php endforeach ?>
  </ul>
  <div class="site-nav__logo visible@alpha-up" data-set="site-logo"></div>
  <ul class="site-nav__menu">
  <?php foreach($pages->visible()->offset(ceil($count/2)) as $page): ?>
    <?php snippet('site-nav-item', array('page' => $page)) ?>
  <?php endforeach ?>
    <li class="site-nav__donate">
      <a href="<?php echo url('donate') ?>">Donate</a>
    </li>
  </ul>
</nav>
