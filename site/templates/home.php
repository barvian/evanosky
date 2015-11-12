<?php snippet('header') ?>

  <main role="main">

    <?php snippet('hero', array(
      'hero' => array(
        'text' => $page->heading(),
        'buttons' => $page->ctas()->yaml()
      )
    )) ?>

    <article class="article">
    <?php if(!$page->intro()->empty()): ?>
      <div class="layout">
        <div class="layout__unit"><?php echo $page->intro()->kirbytext() ?></div>
      </div>
    <?php endif ?>
      <div class="landmark layout layout--wide">
        <div class="layout__unit">
          <div class="block-grid-2 block-grid-4@bravo has-border"><!--
            <?php foreach($page->links()->yaml() as $link): ?>
            --><?php snippet('icon-link', array(
              'link' => array(
                'page' => $link['page'],
                'icon' => $page->file($link['icon']),
                'label' => kirbytext($link['label'])
              )
            )) ?><!--
            <?php endforeach ?>
          --></div>
        </div>
      </div>
    <?php if(!$page->text()->empty()): ?>
      <div class="layout">
        <div class="layout__unit"><?php echo $page->text()->kirbytext() ?></div>
      </div>
    <?php endif ?>
    </article>

  </main>

<?php snippet('footer') ?>
