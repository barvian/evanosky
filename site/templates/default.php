<?php snippet('header') ?>

  <main class="main" role="main">
    <article class="article">
      <?php snippet('hero', array(
        'mod' => 'header',
        'hero' => array(
          'text' => $page->title()->html()
        )
      )) ?>

      <div class="layout">
        <div class="layout__unit">
          <?php echo $page->text()->kirbytext() ?>
        </div>
      </div>

    </article>
  </main>

<?php snippet('footer') ?>
