  <footer class="site-footer" role="contentinfo">
    <div class="layout">
      <div class="layout__unit w1/3 footer__address"><?php echo $site->address()->kirbytext() ?></div><!--
      <?php if(!$site->footerImage()->isEmpty()): ?>
      --><div class="layout__unit w1/3 footer__image">
        <img src="<?php echo $site->footerImage()->toFile()->url() ?>" alt="<?php echo html($site->footerImage()->toFile()->title()) ?>" />
      </div><!--
      <?php endif ?>
      --><div class="layout__unit w1/3 footer__tax"><?php echo $site->tax()->kirbytext() ?></div>
    </div>
  </footer>

  <?php echo js('public/scripts/evanosky.js') ?>

</html>
