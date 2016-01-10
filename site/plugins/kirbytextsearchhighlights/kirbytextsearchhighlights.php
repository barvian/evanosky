<?php

kirbytext::$post[] = function($kirbytext, $value) {
  if (get('matches')) {
    $q = call(kirby::instance()->option('smartypants.parser'), get('matches'));
    $words = implode('|', explode(' ', $q));
    return preg_replace("/(".$words.")(?![^\<]*\>)/ui", "<mark>$0</mark>", $value);
  }
  return $value;
};