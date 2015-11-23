<?php if($currentPage->depth() > 1 && ($currentPage->hasPrevVisible() || $currentPage->hasNextVisible())): ?>
<?php $inflector = \ICanBoogie\Inflector::get(\ICanBoogie\Inflector::DEFAULT_LOCALE) ?>
<?php $parent = $currentPage->parent()->title() ?>
<?php $flip = isset($flip) && $flip ?>
<?php if(!isset($url)) $url = function($page) { return $page->url(); } ?>
<?php if(!isset($target)) $target = function($page) { return '_self'; } ?>
<?php $category = str_word_count($parent) == 1 ? $inflector->singularize(str_word_count($parent, 1)[0]) : null ?>
<nav class="pagination <?php echo isset($class) ? $class : '' ?> <?php echo isset($mod) ? 'pagination--'.$mod : '' ?>">
  <div class="layout"><div class="layout__unit">
    <ul class="pagination__menu">
      <?php if($flip ? $currentPage->hasNextVisible() : $currentPage->hasPrevVisible()): ?>
      <li class="pagination__prev">
        <?php $prev = $flip ? $currentPage->nextVisible() : $currentPage->prevVisible() ?>
        <a class="pagination__link" href="<?php e($prev->template() == 'external', $prev->external(), $url($prev)) ?>">
          <?php snippet('sprite', [
            'class' => 'pagination__caret',
            'sprite' => 'chevron-thin-left'
          ]) ?>
          <span class="pagination__description"><!--Previous--><?php echo $parent ?><?php// e($category, ' '.$category) ?></span>
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
          <span class="pagination__description"><!--Next--><?php echo $parent ?><?php// e($category, ' '.$category) ?></span>
          <span class="pagination__page"><?php echo $next->title()->html() ?></span>
        </a>
      </li>
      <?php endif ?>
    </ul>
  </div></div>
</nav>
<?php endif ?>