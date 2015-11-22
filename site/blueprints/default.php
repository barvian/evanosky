<?php if(!defined('KIRBY')) exit ?>

title: Page
pages:
  template:
    - default
    - external
files: true
fields:
  title:
    label: Title
    type: text
  text:
    label: Text
    type: textarea
