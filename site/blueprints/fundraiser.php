<?php if(!defined('KIRBY')) exit ?>

title: Fundraiser
pages: false
files:
  sortable: true
fields:
  title:
    label: Title
    type:  text
    required: true
  year:
    label: Year
    type:  number
    required: true
    placeholder: 2015
    step: 1
  image:
    label: Featured image
    type: selector
    mode: single
    types:
        - image
  text:
    label: Text
    type:  textarea
