<?php snippet('header') ?>

  <main class="main" role="main">
    <header class="hero hero--header layout layout--wide">
      <?php snippet('breadcrumbs', [
        'currentPage' => $page,
        'class' => 'layout__unit'
      ]) ?>
      <h1 class="hero__text layout__unit"><?php echo $page->title()->html() ?></h1>
    </header>

    <?php snippet('section-nav', [
      'currentPage' => $page
    ]) ?>

    <article class="article">
      <div class="layout">
        <div class="layout__unit">
          <?php echo $page->text()->kirbytext() ?>

          <?php // snippet('fast-fact') ?>
        </div>
      </div>
    </article>

    <?php snippet('pagination', [
      'currentPage' => $page,
      'flip' => true
    ]) ?>
  </main>

<?php snippet('footer') ?>
