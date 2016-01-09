<?php $facts = $site->page('fast-facts')->facts()->yaml() ?>
<?php $fact = $facts[isset($id) && $id !== 'random' ? $id : array_rand($facts)] ?>
<aside class="fast-fact<?php echo isset($class) ? " $class" : '' ?><?php echo isset($mod) ? ' fast-fact--'.$mod : '' ?>">
  <header class="fast-fact__header">
    <h3><?php echo isset($header) && $header != null ? $header : 'Did you know?' ?></h3>
  </header>
  <div class="fast-fact__body">
    <?php echo kirbytext($fact['text']) ?>
  </div>
</aside>