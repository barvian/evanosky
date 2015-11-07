<?php if(!defined('KIRBY')) exit ?>

title: News & Events
pages:
  num: date
  sort: flip
  template:
    - news
    - event
    - annual-report
deletable: false
files: false
fields:
  title:
    label: Title
    type: text
  text:
    label: Text
    type: textarea
