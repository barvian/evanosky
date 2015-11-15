<ul class="site-nav__menu <?php echo isset($class) ? $class : '' ?>">
  <?php foreach($pages as $page): ?>
  <li class="site-nav__<?php echo $page->slug() ?> <?php e($page->hasVisibleChildren(), 'has-sub') ?><?php e($page->isOpen(), ' is-active') ?>">
    <a href="<?php echo $page->url() ?>"><?php echo $page->title()->html() ?></a>
    <?php snippet('sprite', [
      'class' => 'site-nav__caret',
      'sprite' => 'chevron-small-down'
    ]) ?>
    <?php if($page->hasVisibleChildren()): ?>
    <div class="dropdown">
      <ul class="dropdown__menu">
        <?php foreach($page->children()->visible() as $page): ?>
        <li>
          <a href="<?php echo $page->url() ?>"><?php echo $page->title()->html() ?></a>

        </li>
        <?php endforeach ?>
      </ul>
    </div>
    <?php endif ?>
  </li>
  <?php endforeach ?>
</ul>