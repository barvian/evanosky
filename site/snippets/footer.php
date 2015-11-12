  <footer class="site-footer" role="contentinfo">
    <div class="layout">
      <div class="layout__unit w1/3@bravo site-footer__address"><?php echo $site->address()->kirbytext() ?></div><!--
      --><div class="layout__unit right w1/3@bravo site-footer__tax"><?php echo $site->tax()->kirbytext() ?></div><!--
      <?php if(!$site->footerImage()->isEmpty()): ?>
      --><div class="layout__unit w1/3@bravo site-footer__image">
        <img src="<?php echo $site->footerImage()->toFile()->url() ?>" alt="<?php echo html($site->footerImage()->toFile()->title()) ?>" />
      </div>
      <?php endif ?>
    </div>
  </footer>

  <?php echo js('public/scripts/evanosky.js') ?>

</html>