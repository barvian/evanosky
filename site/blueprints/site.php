<?php if(!defined('KIRBY')) exit ?>

title: Site
pages: default
fields:
  title:
    label: Title
    type: text
  address:
    label: Address
    type: textarea
  description:
    label: Description
    type: textarea
  keywords:
    label: Keywords
    type:  tags
  copyright:
    label: Copyright
    type: textarea
  tax:
    label: Tax information
    type: textarea
  footerImage:
    label: Footer image
    type: selector
    mode: single
    types:
        - image
