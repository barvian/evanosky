<?php

kirbytext::$post[] = function($kirbytext, $value) {
  $snippets = [
    "<li>\n<" => '<li><'
  ];
  $keys     = array_keys($snippets);
  $values   = array_values($snippets);
  return str_replace($keys, $values, $value);
};