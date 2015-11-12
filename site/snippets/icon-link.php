<a class="icon-link<?php echo isset($class) ? " $class" : '' ?><?php echo isset($mod) ? ' icon-link--'.$mod : '' ?>"<?php echo isset($link['page']) ? ' href="'.url($link['page']).'"' : '' ?>>
  <div class="icon-link__icon">
  <?php if($link['icon']->extension() == 'svg'): ?>
    <?php echo $link['icon']->read() ?>
  <?php else: ?>
    <img src="<?php echo $icon->url() ?>" alt="" />
  <?php endif ?>
  </div>
  <div class="icon-link__label">
    <?php echo $link['label'] ?>
  </div>
</a>