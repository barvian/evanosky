<?php if(!defined('KIRBY')) exit ?>

title: Annual Report
pages: false
files:
  sortable: true
fields:
  title:
    label: Title
    type:  text
    required: true
  file:
    label: Report
    type: selector
    mode: single
    types:
      - document
