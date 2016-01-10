import {breakpoints} from '../variables';
import $ from 'jquery';
/* eslint-disable no-unused-vars */
import pictureFill from 'picturefill';
import payment from 'jquery.payment';
import inputDelay from './components/jquery.input-delay';
import inputCustom from './components/jquery.input-custom';
import overlaySearch from './components/jquery.overlay-search';
import multistep from './components/jquery.multistep';
import donate from './components/jquery.donate';
import appendAround from 'wsol-append-around';
/* eslint-enable no-unused-vars */
import enquire from 'enquire';

const transitionEnd =
  'transitionend webkitTransitionEnd oTransitionEnd';

$(function() {
  $('.js-aa').wsol_appendAround();
  $('.js-open-nav, .js-close-nav').on('click', event => {
    event.preventDefault();
    $('html').toggleClass('has-open-nav');
  });

  // Site site
  $('.js-open-search').on('click', event => {
    event.preventDefault();
    $('html').addClass('has-open-search').one(transitionEnd, () => {
      $('.site-search__field').focus();
    });
  });
  $('.js-close-search').on('click', event => {
    event.preventDefault();
    $('html').removeClass('has-open-search');
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
