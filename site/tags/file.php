<?php

// Override to target="_blank" by default
kirbytext::$tags['file'] = [
  'attr' => array(
    'text',
    'class',
    'title',
    'rel',
    'target',
    'popup'
  ),
  'html' => function($tag) {
    // build a proper link to the file
    $file = $tag->file($tag->attr('file'));
    $text = $tag->attr('text');
    if(!$file) return $text;
    // use filename if the text is empty and make sure to
    // ignore markdown italic underscores in filenames
    if(empty($text)) $text = str_replace('_', '\_', $file->name());
    return html::a($file->url(), html($text), [
      'class'  => $tag->attr('class'),
      'title'  => html($tag->attr('title')),
      'rel'    => $tag->attr('rel'),
      'target' => $tag->target() == null ? '_blank' : $tag->target(),
    ]);
  }
];