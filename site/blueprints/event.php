<?php if(!defined('KIRBY')) exit ?>

title: Event
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
  file:
    label: Full article
    type: selector
    mode: single
    types:
      - document
