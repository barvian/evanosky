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
  prematching:
    label: Matching gifts - pre
    type: textarea
  companies:
    label: Matching companies
    type: structure
    entry: >
      {{name}}
    fields:
      name:
        label: Name
        type: text
        required: true
      logo:
        label: Logo
        type: selector
        mode: single
        types:
          - image
      url:
        label: URL
        type: url
  postmatching:
    label: Matching gifts - post
    type: textarea
  thanks:
    label: Thank you
    type: textarea
  javascript:
    label: Javascript Error
    type: textarea
