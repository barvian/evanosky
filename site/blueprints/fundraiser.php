<?php if(!defined('KIRBY')) exit ?>

title: Fundraiser
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
  image:
    label: Featured image
    type: selector
    mode: single
    types:
      - image
  text:
    label: Text
    type: textarea
