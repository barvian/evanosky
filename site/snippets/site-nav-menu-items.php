<?php foreach($pages as $page): ?>
<li class="site-nav__<?php echo $page->slug() ?> <?php e($page->hasVisibleChildren(), 'has-sub') ?><?php e($page->isOpen(), ' is-active') ?>">
  <a href="<?php echo $page->url() ?>"><?php echo $page->title()->html() ?></a>
  <?php snippet('sprite', [
    'class' => 'site-nav__caret',
    'sprite' => 'chevron-small-down'
  ]) ?>
  <?php if($page->hasVisibleChildren()): ?>
  <div class="dropdown">
    <?php snippet('dropdown-menu', ['pages' => $page->children()->visible()]) ?>
  </div>
  <?php endif ?>
</li>
<?php endforeach ?>
