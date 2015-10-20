<div class="hero <?php echo isset($class) ? $class : '' ?>">
  <div class="hero__box">
    <h1 class="hero__text"><?php echo $hero['text'] ?></h1>
    <div class="hero__buttons">
      <?php foreach($hero['buttons'] as $button): ?>
      <a href="<?php echo url($button['page']) ?>" class="hero__button">
        <span class="hero__button__question"><?php echo $button['callout'] ?></span>
        <?php echo $button['action'] ?>.
      </a>
      <?php endforeach ?>
    </div>
  </div>
</div>
