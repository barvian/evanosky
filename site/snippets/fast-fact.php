<?php $fact = $site->page('fast-facts')->facts()->yaml()[isset($id) ? $id : array_rand($site->page('fast-facts')->facts()->yaml())] ?>
<aside class="fast-fact<?php echo isset($class) ? " $class" : '' ?><?php echo isset($mod) ? ' fast-fact--'.$mod : '' ?>">
  <header class="fast-fact__header"><?php echo isset($header) ? $header : 'Did you know?' ?></header>
  <?php echo kirbytext($fact['text']) ?>
</aside>