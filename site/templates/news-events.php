<?php snippet('header') ?>

  <main class="main" role="main">
    <header class="hero hero--header layout layout--wide">
      <h1 class="hero__text layout__unit"><?php echo $page->title()->html() ?></h1>
    </header>

    <div class="layout">
      <div class="layout__unit">
        <?php echo $page->text()->kirbytext() ?>

        <section id="news">
          <h2>News</h2>
          <nav class="link-list">
            <?php foreach($page->children()->visible()->filter(function($child) {
              return $child->template() == 'news';
            })->sortBy('date', 'desc') as $news): ?>
            <article>
              <a class="link-list__link" href="<?php echo $news->file()->url() ?>" target="_blank">
                <time class="link-list__meta" datetime="<?php echo date('Y-m-d', $news->date()) ?>"><?php echo date('F j, Y', $news->date()) ?></time>
                <h1 class="link-list__title"><?php echo $news->title()->html() ?></h1>
                <p class="link-list__teaser"><?php echo $news->teaser()->excerpt(300) ?></p>
                <?php snippet('sprite', array(
                  'class' => 'link-list__caret',
                  'sprite' => 'chevron-thin-right'
                )) ?>
              </a>
            </article>
            <?php endforeach ?>
          </nav>
        </section>

        <section id="annual-reports">
          <h2>Annual Reports</h2>
          <nav class="link-list">
            <?php foreach($page->children()->visible()->filter(function($child) {
              return $child->template() == 'annual-report';
            })->sortBy('title', 'desc') as $report): ?>
            <article>
              <a class="link-list__link" href="<?php echo $report->file()->url() ?>" target="_blank">
                <h1 class="link-list__title"><?php echo $report->title()->html() ?></h1>
                <?php snippet('sprite', array(
                  'class' => 'link-list__caret',
                  'sprite' => 'chevron-thin-right'
                )) ?>
              </a>
            </article>
            <?php endforeach ?>
          </nav>
        </section>

        <section id="events">
          <h2>Events</h2>
          <nav class="link-list">
            <?php foreach($page->children()->visible()->filter(function($child) {
              return $child->template() == 'event';
            })->sortBy('date', 'desc') as $event): ?>
            <article>
              <a class="link-list__link" href="<?php echo $event->file()->url() ?>" target="_blank">
                <time class="link-list__meta" datetime="<?php echo date('Y-m-d', $event->date()) ?>"><?php echo date('F j, Y', $event->date()) ?></time>
                <h1 class="link-list__title"><?php echo $event->title()->html() ?></h1>
                <?php snippet('sprite', array(
                  'class' => 'link-list__caret',
                  'sprite' => 'chevron-thin-right'
                )) ?>
              </a>
            </article>
            <?php endforeach ?>
          </nav>
        </section>
      </div>
    </div>
  </main>

<?php snippet('footer') ?>
