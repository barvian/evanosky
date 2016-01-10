<?php if($currentPage->hasVisibleChildren()): ?>
<nav class="section-nav <?php echo isset($class) ? $class : '' ?><?php echo isset($mod) ? ' section-nav--'.$mod : '' ?>">
  <?php if(isset($sectionNav) && $sectionNav['header']): ?>
  <header class="section-nav__header">
    <?php e($sectionNav['header'] === true, 'In this section', $sectionNav['header']) ?>
  </header>
  <?php endif ?>
  <ul class="section-nav__menu">
    <?php foreach($currentPage->children()->visible() as $page): ?>
    <li<?php e($page->intendedTemplate() == 'external', ' class="is-external"') ?>>
      <a <?php e($page->intendedTemplate() == 'external', 'target="_blank" href="'.$page->external().'"', 'href="'.$page->url().'"') ?>>
        <?php snippet('sprite', [
          'class' => 'section-nav__caret',
          'sprite' => 'chevron-thin-right'
        ]) ?>
        <?php echo $page->title()->html() ?>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
</nav>
<?php endif ?>