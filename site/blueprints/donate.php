<?php if(!defined('KIRBY')) exit ?>

title: Donate
pages:
  template:
    - default
    - external
deletable: false
files: true
fields:
  title:
    label: Title
    type: text
  text:
    label: Text
    type: textarea
  thanks:
    label: Thank you
    type: textarea
  javascript:
    label: Javascript Error
    type: textarea
