<?php if(!defined('KIRBY')) exit ?>

title: Annual Report
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
  report:
    label: Report
    type: selector
    mode: single
    types:
      - document
