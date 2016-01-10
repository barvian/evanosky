<?php ob_start(); ?>
<?php $q = call(kirby::instance()->option('smartypants.parser'), get('q')) ?>
<?php $words = implode('|', explode(' ', $q)) ?>
<?php $pages = $site->search(get('q'), 'title|text')->filter(function($page) {
  return $page->visible() ||
    $page->intendedTemplate() == 'news' ||
    $page->intendedTemplate() == 'event' ||
    $page->intendedTemplate() == 'annual-report';
}) ?>
<?php foreach($pages as $page): ?>
<article>
  <a class="link-list__link" href="<?php echo $page->article()->empty() ? $page->url().'?'.http_build_query(['matches' => get('q')]) : $page->article()->toFile()->url() ?>" target="<?php e($page->article()->empty(), '_self', '_blank') ?>">
    <?php if($page->parents()->count() > 0): ?>
    <header class="link-list__meta">
      <?php echo implode(' > ', $page->parents()->flip()->map(function($page) { return $page->title()->html(); })->toArray()) ?>
      >
    </header>
    <?php endif ?>
    <h1 class="link-list__title"><?php echo $page->title()->html() ?></h1>
    <p class="link-list__teaser">

      <?php echo preg_replace("/(".$words.")/ui", "<mark>$0</mark>", $page->text()->excerpt(150)) ?>
    </p>
    <?php snippet('sprite', array(
      'class' => 'link-list__caret',
      'sprite' => 'chevron-thin-right'
    )) ?>
  </a>
</article>
<?php endforeach ?>
<?php $results  = ob_get_clean(); ?>
<?php if(get('ajax')): ?>
<?php echo $results ?>
<?php else: ?>
<?php snippet('header') ?>

  <main class="main" role="main">
    <div class="hero hero--search">
      <form class="hero__box form" action="" method="GET" autocomplete="on">
        <div class="pack pack--middle form__choices">
          <input type="text" name="q" placeholder="Search..." value="<?php echo get('q') ?>" />
          <button type="submit" class="btn btn--primary pack__shrink pack__stretch">
            <?php snippet('sprite', [
              'sprite' => 'magnifying-glass'
            ]) ?>
          </button>
        </div>
      </form>
    </div>

    <div class="layout">
      <div class="layout__unit">
        <nav class="link-list site-search__items">
          <?php echo $results ?>
        </nav>
      </div>
    </div>
  </main>

<?php snippet('footer') ?>
<?php endif ?>