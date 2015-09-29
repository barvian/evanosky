<?php snippet('header') ?>

  <main role="main">

    <?php snippet('hero', array(
      'text' => $page->heading(),
      'buttons' => $page->ctas()->yaml()
    )) ?>

    <?php echo $page->intro()->kirbytext() ?>
    <?php snippet('projects') ?>

    <?php echo $page->text()->kirbytext() ?>

  </main>

<?php snippet('footer') ?>
