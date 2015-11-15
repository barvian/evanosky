<?php snippet('header') ?>

  <main class="main" role="main">
    <article class="article fundraiser">
      <header class="hero hero--header layout layout--wide">
        <?php snippet('breadcrumbs', [
          'currentPage' => $page,
          'class' => 'layout__unit'
        ]) ?>
        <h1 class="hero__text layout__unit"><?php echo $page->title()->html() ?></h1>
      </header>

      <div class="layout">
        <div class="layout__unit">
          <figure>
            <img src="<?php echo $page->image()->url() ?>" alt="<?php echo $page->title() ?>" />
          </figure>
          <?php echo $page->text()->kirbytext() ?>
        </div>
      </div>

    </article>

    <?php snippet('pagination', [
      'currentPage' => $page
    ]) ?>
  </main>

<?php snippet('footer') ?>
