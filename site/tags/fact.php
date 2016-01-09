<?php

kirbytext::$tags['fact'] = [
  'html' => function($tag) {
    return snippet('fast-fact', [
      'id' => $tag->attr('fact'),
      'header' => $tag->attr('header')
    ], true);
  }
];