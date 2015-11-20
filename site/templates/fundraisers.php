<?php snippet('header') ?>

  <main class="main" role="main">
    <header class="hero hero--header layout layout--wide">
      <h1 class="hero__text layout__unit"><?php echo $page->title()->html() ?></h1>
    </header>

    <div class="layout">
      <div class="layout__unit">
        <?php echo $page->text()->kirbytext() ?>

        <nav class="link-list">
          <?php foreach($page->children()->visible()->sortBy('date', 'desc') as $fundraiser): ?>
          <article>
            <a class="link-list__link" href="<?php echo $fundraiser->article()->empty() ? $fundraiser->url() : $fundraiser->article()->toFile()->url() ?>" target="<?php e($fundraiser->article()->empty(), '_self', '_blank') ?>">
              <time class="link-list__meta" datetime="<?php echo date('Y-m-d', $fundraiser->date()) ?>"><?php echo date('F j, Y', $fundraiser->date()) ?></time>
              <h1 class="link-list__title"><?php echo $fundraiser->title()->html() ?></h1>
              <?php if($fundraiser->teaser()): ?>
              <p class="link-list__teaser"><?php echo $fundraiser->teaser() ?></p>
              <?php snippet('sprite', [
                'class' => 'link-list__caret',
                'sprite' => 'chevron-thin-right'
              ]) ?>
              <?php endif ?>
            </a>
          </article>
          <?php endforeach ?>
        </nav>
      </div>
    </div>
  </main>

<?php snippet('footer') ?>
