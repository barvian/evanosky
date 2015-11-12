<nav class="site-nav" role="navigation">
  <?php $count = $pages->visible()->count() ?>
  <?php snippet('site-nav-menu', array('pages' => $pages->visible()->limit(ceil($count/2)))) ?>
  <div class="site-nav__logo visible@alpha-up" data-set="site-logo"></div>
  <?php snippet('site-nav-menu', array('pages' => $pages->visible()->offset(ceil($count/2)))) ?>
  </ul>
</nav>