<?php if(!isset($date)) $date = true ?>
<?php if(!isset($url)) $url = function($page) {
  return $page->article()->empty() ?
    ($page->intendedTemplate() === 'external' ? $page->external() : $page->url()) :
    $page->article()->toFile()->url();
} ?>
<?php if(!isset($target)) $target = function($page) {
  return !$page->article()->empty() || $page->intendedTemplate() === 'external' ?
    '_blank' :
    '_self';
} ?>
<nav class="link-list<?php echo isset($class) ? " $class" : '' ?><?php echo isset($mod) ? ' icon-link--'.$mod : '' ?>">
  <?php foreach($pages as $page): ?>
  <article>
    <a class="link-list__link" href="<?php echo $url($page) ?>" target="<?php echo $target($page) ?>">
      <?php if(($date && $page->date()) || !$page->ref()->empty()): ?>
      <header class="link-list__meta">
        <time datetime="<?php echo date('Y-m-d', $page->date()) ?>"><?php echo date('F j, Y', $page->date()) ?></time>
        <?php if(!$page->ref()->empty()): ?><span><?php echo $page->ref() ?></span><?php endif ?>
      </header>
      <?php endif ?>
      <h1 class="link-list__title"><?php echo $page->title()->html() ?></h1>
      <?php if(!$page->teaser()->empty()): ?>
      <p class="link-list__teaser">"<?php echo $page->teaser()->excerpt(300) ?>"</p>
      <?php endif ?>
      <?php snippet('sprite', array(
        'class' => 'link-list__caret',
        'sprite' => 'chevron-thin-right'
      )) ?>
    </a>
  </article>
  <?php endforeach ?>
</nav>