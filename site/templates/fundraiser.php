<?php snippet('header') ?>

  <main class="main" role="main">
    <article class="article fundraiser">
      <?php snippet('hero', array(
        'mod' => 'header',
        'hero' => array(
          'text' => $page->title()->html()
        )
      )) ?>

      <div class="layout">
        <div class="layout__unit">
          <figure>
            <img src="<?php echo $page->image()->url() ?>" alt="<?php echo $page->title() ?>" />
          </figure>
          <?php echo $page->text()->kirbytext() ?>
        </div>
      </div>

    </article>

    <?php snippet('pagination', array(
      'currentPage' => $page
    )) ?>
  </main>

<?php snippet('footer') ?>
