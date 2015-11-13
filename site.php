<?php

$kirby = kirby();

// Prevent panel breakage
switch(url::host()) {
  case 'evanosky.local': $kirby->urls->index = 'http://evanosky.local';
  default: $kirby->urls->index = 'http://'.url::host();
}

// avatars folder
$kirby->roots->avatars = $kirby->roots()->index() . DS . 'public' . DS . 'avatars';
$kirby->urls->avatars  = $kirby->urls()->index() . '/public/avatars';

// thumbs folder
$kirby->roots->thumbs = $kirby->roots()->index() . DS . 'public' . DS . 'thumbs';
$kirby->urls->thumbs  = $kirby->urls()->index() . '/public/thumbs';
