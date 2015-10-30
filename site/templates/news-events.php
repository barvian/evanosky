<?php snippet('header') ?>

  <main class="main" role="main">
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
  </main>

<?php snippet('footer') ?>
