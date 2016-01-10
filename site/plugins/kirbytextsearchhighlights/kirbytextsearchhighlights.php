<?php

kirbytext::$pre[] = function($kirbytext, $value) {
  if (get('matches')) {
    $words = implode('|', explode(' ', get('matches')));
    return preg_replace("/(".$words.")(?![^\(]*\))/i", "<mark>$0</mark>", $value);
  }
  return $value;
};