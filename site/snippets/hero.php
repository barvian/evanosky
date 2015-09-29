<div class="hero">
  <div class="hero__box">
    <h1 class="hero__text"><?php echo $text ?></h1>
    <div class="hero__buttons">
      <?php foreach($buttons as $cta): ?>
      <a href="<?php echo url($cta['page']) ?>">
        <?php echo $cta['callout'] ?><br/>
        <?php echo $cta['action'] ?>.
      </a>
      <?php endforeach ?>
    </div>
  </div>
</div>
