<?php snippet('header') ?>

  <main class="main" role="main">
    <article class="article">

      <div class="layout">
        <div class="layout__unit">
          <h1><?php echo $page->title()->html() ?></h1>
          <?php echo $page->text()->kirbytext() ?>
        </div>
      </div>
      
    </article>
  </main>

<?php snippet('footer') ?>
