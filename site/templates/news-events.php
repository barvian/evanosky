<?php snippet('header') ?>

  <main class="main" role="main">
    <header class="hero hero--tabs layout layout--wide">
      <h1 class="hero__text layout__unit"><?php echo $page->title()->html() ?></h1>
    </header>

    <div class="layout">
      <div class="layout__unit">
        <?php echo $page->text()->kirbytext() ?>

        <section id="news">
          <h2>News</h2>
          <?php snippet('link-list', array(
            'pages' => $page->children()->visible()->filter(function($child) {
              return $child->intendedTemplate() == 'news';
            })->sortBy('date', 'desc')
          )) ?>
        </section>

        <section id="annual-reports">
          <h2>Annual Reports</h2>
          <?php snippet('link-list', array(
            'pages' => $page->children()->visible()->filter(function($child) {
              return $child->intendedTemplate() == 'annual-report';
            })->sortBy('date', 'desc'),
            'date' => false
          )) ?>
        </section>

        <section id="events">
          <h2>Events</h2>
          <?php snippet('link-list', array(
            'pages' => $page->children()->visible()->filter(function($child) {
              return $child->intendedTemplate() == 'event';
            })->sortBy('date', 'desc')
          )) ?>
        </section>
      </div>
    </div>
  </main>

<?php snippet('footer') ?>
