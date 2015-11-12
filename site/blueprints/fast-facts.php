<?php if(!defined('KIRBY')) exit ?>

title: Fast facts
pages: fast-fact
deletable: false
files: false
fields:
  title:
    label: Title
    type: text
  facts:
    label: Facts
    type: structure
    entry: >
      {{text}}
    fields:
      text:
        label: Text
        type: textarea
        required: true
