<?php if(!defined('KIRBY')) exit ?>

title: Home
pages: false
fields:
  title:
    label: Title
    type: text
  heading:
    label: Heading
    type: text
    required: true
    default: Join us in the fight against MLD.
  ctas:
    label: Calls to action
    type: structure
    entry: >
      {{callout}}<br />
      {{action}}.
    fields:
      callout:
        label: Callout
        type: text
        required: true
      action:
        label: Action
        type: text
        required: true
      page:
        label: Page
        type: page
        required: true
  line-intro:
    type: line
  intro:
    label: Intro
    type: textarea
    size: large
  links:
    label: Links
    type: structure
    entry: >
      {{label}}
    fields:
      page:
        label: Page
        type: page
        required: true
      icon:
        label: Icon
        type: selector
        mode: single
        types:
            - image
      label:
        label: Label
        type: textarea
        required: true
  line-main:
    type: line
  text:
    label: Text
    type: textarea
