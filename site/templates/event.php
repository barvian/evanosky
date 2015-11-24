<?php snippet('header') ?>

  <main class="main" role="main">
    <article class="article event">
      <header class="hero hero--header layout layout--wide">
        <?php snippet('breadcrumbs', [
          'currentPage' => $page,
          'class' => 'layout__unit'
        ]) ?>
        <h1 class="hero__text layout__unit"><?php echo $page->title()->html() ?></h1>
      </header>

      <div class="layout">
        <div class="layout__unit">
          <?php echo $page->text()->kirbytext() ?>
        </div>
      </div>

    </article>

    <?php snippet('pagination', [
      'currentPage' => $page,
      'filter' => function($page) {
        return $page->template() == 'event';
      },
      'term' => 'Event',
      'url' => function($page) {
        return $page->article()->empty() ? $page->url() : $page->article()->toFile()->url();
      },
      'target' => function($page) {
        return $page->article()->empty() ? '_self' : '_blank';
      }
    ]) ?>
  </main>

<?php snippet('footer') ?>
