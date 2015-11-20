<?php if(!defined('KIRBY')) exit ?>

title: Fundraisers
pages:
  num: date
  sort: flip
  template:
    - fundraiser
deletable: false
files: false
fields:
  title:
    label: Title
    type: text
  text:
    label: Text
    type: textarea
