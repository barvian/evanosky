<?php if(!defined('KIRBY')) exit ?>

title: News Listing
pages:
  template:
    - news
deletable: false
files: false
fields:
  title:
    label: Title
    type: text
  text:
    label: Text
    type: textarea
