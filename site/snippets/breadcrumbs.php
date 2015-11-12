<?php if($currentPage->depth() > 1): ?>
<nav class="breadcrumbs <?php echo isset($class) ? $class : '' ?> <?php echo isset($mod) ? 'breadcrumbs--'.$mod : '' ?>">
  <?php $pages = $currentPage->parents()->flip()->prepend('home', $site->homePage()) ?>
  <?php if (isset($includeCurrent) && $includeCurrent) $pages = $pages->append('current', $currentPage) ?>
  <ul class="breadcrumbs__menu">
    <?php foreach($pages as $page): ?>
    <li>
      <a href="<?php echo $page->url() ?>"><?php echo $page->title()->html() ?></a>
    </li>
    <?php endforeach ?>
  </ul>
</nav>
<?php endif ?>