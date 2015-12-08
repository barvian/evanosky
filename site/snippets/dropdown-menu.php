<ul class="dropdown__menu <?php echo isset($class) ? $class : '' ?>">
  <?php foreach($pages as $page): ?>
  <li<?php e($page->intendedTemplate() == 'external', ' class="is-external"') ?>>
    <a href="<?php e($page->intendedTemplate() == 'external', $page->external(), $page->url()) ?>"><?php echo $page->title()->html() ?></a>
  </li>
  <?php endforeach ?>
</ul>