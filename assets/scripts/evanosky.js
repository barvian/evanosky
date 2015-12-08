import {breakpoints} from '../variables';
import pictureFill from 'picturefill';
import $ from 'jquery';
import payment from 'jquery.payment';
import inputCustom from './components/jquery.input-custom';
import multistep from './components/jquery.multistep';
import donate from './components/jquery.donate';
import appendAround from 'wsol-append-around';
import enquire from 'enquire';

$(function() {
  $('.js-aa').wsol_appendAround();
  $('.js-open-nav, .js-close-nav').on('click', function(event) {
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
