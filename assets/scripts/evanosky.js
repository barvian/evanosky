import {breakpoints} from '../variables';
import $ from 'jquery';
/* eslint-disable no-unused-vars */
import pictureFill from 'picturefill';
import payment from 'jquery.payment';
import inputCustom from './components/jquery.input-custom';
import multistep from './components/jquery.multistep';
import donate from './components/jquery.donate';
import appendAround from 'wsol-append-around';
/* eslint-enable no-unused-vars */
import enquire from 'enquire';

$(function() {
  $('.js-aa').wsol_appendAround();
  $('.js-open-nav, .js-close-nav').on('click', () => {
    $('html').toggleClass('has-open-nav');
  });

  // Queries
  enquire.register(breakpoints['site-nav-spread'], {
    match: () => {
      $('body').removeClass('has-open-nav');
    },
    unmatch: () => {

    }
  });
});
