/**
 * Mobile menu toggle interactions for the Divi theme.
 *
 * Purpose: Handles the hamburger animation and slide-in menu visibility on mobile devices.
 * Usage context: Attach to pages that include the `#slide-in-open` trigger and `.slide-in-menu-container` wrapper.
 * Author: André Marinho
 * Website: andremarinho.me
 * Version: 1.0.1
 *
 * @package DST_Menu_001
 */
jQuery(function ($) {
  $('#slide-in-open').click(function () {
    $(this).toggleClass('open');
    $('.slide-in-menu-container').toggleClass('slide-in-menu');
  });
});

jQuery(document).ready(function () {
  var totalheight = 0;

  jQuery('.et-l--header .et_builder_inner_content .et_pb_section').each(function () {
    totalheight = totalheight + jQuery(this).outerHeight();
  });

  totalheight = totalheight + 'px';

  jQuery('#et-main-area').css('padding-top', totalheight);
});
