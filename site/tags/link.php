<?php

// override to target="_blank" if external link
kirbytext::$tags['link'] = [
  'attr' => array(
    'text',
    'class',
    'title',
    'rel',
    'lang',
    'target',
    'popup'
  ),
  'html' => function($tag) {
    $link = url($tag->attr('link'), $tag->attr('lang'));
    $text = $tag->attr('text');
    if(empty($text)) {
      $text = $link;
    }
    if(str::isURL($text)) {
      $text = url::short($text);
    }
    return html::a($link, $text, [
      'rel'    => $tag->attr('rel'),
      'class'  => $tag->attr('class'),
      'title'  => $tag->attr('title'),
      'target' => str::isURL($tag->attr('link')) ? "_blank" : $tag->target(),
    ]);
  }
];