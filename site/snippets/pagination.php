<?php $isLanding = $currentPage->depth() == 1 && $currentPage->hasVisibleChildren() ?>
<?php if($isLanding || $currentPage->hasPrevVisible() || $currentPage->hasNextVisible()): ?>
<nav class="pagination <?php echo isset($class) ? $class : '' ?> <?php echo $isLanding ? 'pagination--landing' : '' ?> <?php echo isset($mod) ? 'pagination--'.$mod : '' ?>">
  <div class="layout"><div class="layout__unit">
    <ul class="pagination__menu">
      <?php if($isLanding): ?>
      <li>
        <?php $child = $currentPage->children()->nth(0) ?>
        <a class="pagination__link" href="<?php echo $child->url() ?>">
          <?php snippet('sprite', array(
            'class' => 'pagination__caret',
            'sprite' => 'chevron-thin-right'
          )) ?>
          <span class="pagination__description">Further reading</span>
          <span class="pagination__page"><?php echo $child->title() ?></span>
        </a>
      </li>
      <?php else: ?>
      <?php if($currentPage->hasPrevVisible()): ?>
      <li class="pagination__prev">
        <?php $prev = $currentPage->prevVisible() ?>
        <a class="pagination__link" href="<?php echo $prev->url() ?>">
          <?php snippet('sprite', array(
            'class' => 'pagination__caret',
            'sprite' => 'chevron-thin-left'
          )) ?>
          <span class="pagination__description">Previous</span>
          <span class="pagination__page"><?php echo $prev->title() ?></span>
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
          <span class="pagination__description">Next</span>
          <span class="pagination__page"><?php echo $next->title() ?></span>
        </a>
      </li>
      <?php endif ?>
      <?php endif ?>
    </ul>
  </div></div>
</nav>
<?php endif ?>
