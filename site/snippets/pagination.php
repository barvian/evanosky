<?php if(!isset($filter)) $filter = function($page) { return true; } ?>
<?php $hasPrevVisible = $currentPage->hasPrevVisible() && $filter($currentPage->prevVisible()) ?>
<?php $hasNextVisible = $currentPage->hasNextVisible() && $filter($currentPage->nextVisible()) ?>

<?php if($currentPage->depth() > 1 && ($hasPrevVisible || $hasNextVisible)): ?>
<?php $inflector = \ICanBoogie\Inflector::get(\ICanBoogie\Inflector::DEFAULT_LOCALE) ?>
<?php $parentTerm = $currentPage->parent()->title() ?>
<?php if (!isset($term)) $term = str_word_count($parentTerm) == 1 && substr(str_word_count($parentTerm, 1)[0], -1, 1) == 's' ? $inflector->singularize(str_word_count($parentTerm, 1)[0]) : null ?>
<?php $flip = isset($flip) && $flip ?>
<?php if(!isset($url)) $url = function($page) { return $page->url(); } ?>
<?php if(!isset($target)) $target = function($page) { return '_self'; } ?>
<nav class="pagination <?php echo isset($class) ? $class : '' ?> <?php echo isset($mod) ? 'pagination--'.$mod : '' ?>">
  <div class="layout"><div class="layout__unit">
    <ul class="pagination__menu">
      <?php if($flip ? $hasNextVisible : $hasPrevVisible): ?>
      <li class="pagination__prev">
        <?php $prev = $flip ? $currentPage->nextVisible() : $currentPage->prevVisible() ?>
        <a class="pagination__link" href="<?php e($prev->template() == 'external', $prev->external(), $url($prev)) ?>">
          <?php snippet('sprite', [
            'class' => 'pagination__caret',
            'sprite' => 'chevron-thin-left'
          ]) ?>
          <span class="pagination__description"><?php e($term, "Previous $term", 'Previous') ?></span>
          <span class="pagination__page"><?php echo $prev->title()->html() ?></span>
        </a>
      </li>
      <?php endif ?>
      <?php if($flip ? $currentPage->hasPrevVisible() : $currentPage->hasNextVisible()): ?>
      <li class="pagination__next">
        <?php $next = $flip ? $currentPage->prevVisible() : $currentPage->nextVisible() ?>
        <a class="pagination__link" href="<?php e($next->template() == 'external', $next->external(), $url($next)) ?>" target="<?php echo $target($next) ?>">
          <?php snippet('sprite', [
            'class' => 'pagination__caret',
            'sprite' => 'chevron-thin-right'
          ]) ?>
          <span class="pagination__description"><?php e($term, "Next $term", 'Next') ?></span>
          <span class="pagination__page"><?php echo $next->title()->html() ?></span>
        </a>
      </li>
      <?php endif ?>
    </ul>
  </div></div>
</nav>
<?php endif ?>