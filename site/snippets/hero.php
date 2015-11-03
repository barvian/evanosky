<div class="hero <?php echo isset($class) ? $class : '' ?> <?php echo isset($mod) ? 'hero--'.$mod : '' ?>">
  <?php if(array_key_exists('buttons', $hero)): ?><div class="hero__box"><?php endif ?>
    <h1 class="hero__text <?php echo $isHeader ? 'layout__unit' : '' ?>"><?php echo $hero['text'] ?></h1>
    <?php if(array_key_exists('buttons', $hero)): ?>
    <div class="hero__buttons">
      <?php foreach($hero['buttons'] as $button): ?>
      <a href="<?php echo url($button['page']) ?>" class="hero__button">
        <?php snippet('sprite', array(
          'class' => 'hero__caret',
          'sprite' => 'chevron-thin-right'
        )) ?>
        <span class="hero__question"><?php echo $button['callout'] ?></span>
        <span class="hero__action"><?php echo $button['action'] ?></span>
      </a>
      <?php endforeach ?>
    </div>
    <?php endif ?>
  </div>
</div>
