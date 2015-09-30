<?php snippet('header') ?>

  <main role="main">

    <?php snippet('hero', array(
      'hero' => array(
        'text' => $page->heading(),
        'buttons' => $page->ctas()->yaml()
      )
    )) ?>

    <div class="layout">
      <div class="layout__unit"><?php echo $page->intro()->kirbytext() ?></div>
    </div>
    <div class="layout layout--wide">
      <div class="layout__unit">
        <div class="pack pack--border">
          <?php foreach($page->links()->yaml() as $link): ?>
          <?php snippet('icon-link', array(
            'link' => array(
              'page' => $link['page'],
              'icon' => $page->file($link['icon']),
              'label' => kirbytext($link['label'])
            )
          )) ?>
          <?php endforeach ?>
        </div>
      </div>
    </div>
    <div class="layout">
      <div class="layout__unit"><?php echo $page->text()->kirbytext() ?></div>
    </div>

  </main>

<?php snippet('footer') ?>
