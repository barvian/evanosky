<?php snippet('header') ?>

  <main class="main" role="main">
    <header class="hero hero--header layout layout--wide">
      <h1 class="hero__text layout__unit"><?php echo $page->title()->html() ?></h1>
    </header>

    <div class="layout">
      <div class="layout__unit">
        <?php echo $page->text()->kirbytext() ?>

        <nav class="link-list">
          <?php foreach($page->children()->visible()->flip() as $campaign): ?>
          <article>
            <a class="link-list__link" href="<?php echo $campaign->url() ?>">
              <time class="link-list__meta" datetime="<?php echo date('Y-m-d', $campaign->date()) ?>"><?php echo date('F j, Y', $campaign->date()) ?></time>
              <h1 class="link-list__title"><?php echo $campaign->title()->html() ?></h1>
              <p class="link-list__teaser"><?php echo $campaign->text()->excerpt(300) ?></p>
              <?php snippet('sprite', array(
                'class' => 'link-list__caret',
                'sprite' => 'chevron-thin-right'
              )) ?>
            </a>
          </article>
          <?php endforeach ?>
        </nav>
      </div>
    </div>
  </main>

<?php snippet('footer') ?>
