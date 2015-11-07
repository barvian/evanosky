<?php if($currentPage->depth() > 1 && ($currentPage->hasPrevVisible() || $currentPage->hasNextVisible())): ?>
<nav class="pagination <?php echo isset($class) ? $class : '' ?> <?php echo isset($mod) ? 'pagination--'.$mod : '' ?>">
  <div class="layout"><div class="layout__unit">
    <ul class="pagination__menu">
      <?php if($currentPage->hasPrevVisible()): ?>
      <li class="pagination__prev">
        <?php $prev = $currentPage->prevVisible() ?>
        <a class="pagination__link" href="<?php echo $prev->url() ?>">
          <?php snippet('sprite', array(
            'class' => 'pagination__caret',
            'sprite' => 'chevron-thin-left'
          )) ?>
          <span class="pagination__description"><?php echo $currentPage->parent()->title()->html() ?></span>
          <span class="pagination__page"><?php echo $prev->title()->html() ?></span>
        </a>
      </li>
      <?php endif ?>
      <?php if($currentPage->hasNextVisible()): ?>
      <li class="pagination__next">
        <?php $next = $currentPage->nextVisible() ?>
        <a class="pagination__link" href="<?php echo $next->url() ?>">
          <?php snippet('sprite', array(
            'class' => 'pagination__caret',
            'sprite' => 'chevron-thin-right'
          )) ?>
          <span class="pagination__description"><?php echo $currentPage->parent()->title()->html() ?></span>
          <span class="pagination__page"><?php echo $next->title()->html() ?></span>
        </a>
      </li>
      <?php endif ?>
    </ul>
  </div></div>
</nav>
<?php endif ?>