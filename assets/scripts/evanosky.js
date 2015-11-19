import {breakpoints} from '../variables';
import pictureFill from 'picturefill';
import $ from 'jquery';
import inputCustom from './components/jquery.input-custom';
import multistep from './components/jquery.multistep';
import donate from './components/jquery.donate';
import appendAround from 'wsol-append-around';
import enquire from 'enquire';

$(function() {
  $('.js-aa').wsol_appendAround();
  $('.js-site-nav').on('click', function(event) {
    $('html, body').toggleClass('has-open-nav').animate({ scrollTop: 0 }, 150);
    $('.site-nav').css('top', $('.site-header').height());
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
