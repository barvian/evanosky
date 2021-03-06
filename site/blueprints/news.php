<?php if(!defined('KIRBY')) exit ?>

title: News
pages: false
files:
  sortable: true
fields:
  title:
    label: Title
    type: text
    required: true
  date:
    label: Date
    type: date
    format: MM/DD/YYYY
    required: true
  article:
    label: Full article
    type: selector
    mode: single
    types:
      - document
  ref:
    label: Reference
    type: text
  teaser:
    label: Teaser
    type: textarea
  text:
    label: Text
    type: textarea
