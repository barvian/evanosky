<?php

$kirby = kirby();

// Prevent panel breakage
echo url::host();
switch(url::host()) {
  case 'evanosky.dev': $kirby->urls->index = 'http://evanosky.dev';
  case 'localhost': $kirby->urls->index = 'http://evanosky.dev';
}

// avatars folder
$kirby->roots->avatars = $kirby->roots()->index() . DS . 'public' . DS . 'avatars';
$kirby->urls->avatars  = $kirby->urls()->index() . '/public/avatars';

// thumbs folder
$kirby->roots->thumbs = $kirby->roots()->index() . DS . 'public' . DS . 'thumbs';
$kirby->urls->thumbs  = $kirby->urls()->index() . '/public/thumbs';
