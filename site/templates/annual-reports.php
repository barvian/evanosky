<?php snippet('header') ?>

  <main class="main" role="main">
    <header class="hero hero--header layout layout--wide">
      <h1 class="hero__text layout__unit"><?php echo $page->title()->html() ?></h1>
    </header>

    <div class="layout">
      <div class="layout__unit">
        <?php echo $page->text()->kirbytext() ?>

        <?php snippet('link-list', array(
          'pages' => $page->children()->filter(function($child) {
            return $child->intendedTemplate() == 'annual-report';
          })->sortBy('date', 'desc'),
          'date' => false
        )) ?>
      </div>
    </div>
  </main>

<?php snippet('footer') ?>
