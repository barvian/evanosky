<ul class="site-nav__menu <?php echo isset($class) ? $class : '' ?>">
  <?php foreach($pages as $index=>$p): ?>
  <li class="<?php e($p->hasVisibleChildren(), 'has-sub') ?><?php e($p->isOpen(), ' is-active') ?>">
    <a href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>

    <?php if($p->hasVisibleChildren()): ?>
    <div class="dropdown">
      <ul class="dropdown__menu">
        <?php foreach($p->children()->visible() as $p): ?>
        <li>
          <a href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>
        </li>
        <?php endforeach ?>
      </ul>
    </div>
    <?php endif ?>
  </li>
  <?php endforeach ?>
</ul>
