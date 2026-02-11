/**
 * Divi multi-content toggle interactions for menu or tab sections.
 *
 * Purpose: Shows one content block at a time based on matching `.ct-button_X` and `.ct-element_X` selectors.
 * Usage context: Attach to pages where Divi modules use the prescribed button and content class naming pattern.
 * Author: André Marinho.
 * Website: andremarinho.me.
 * Version: 1.0.1
 *
 * @package DST_Multi_Content_Toggle
 */
jQuery(function ($) {
  var buttons = {
    '.ct-button_1': {
      toggle: '',
      hide: '.ct-element_2, .ct-element_3, .ct-element_4 .ct-element_5',
      show: '.ct-element_1',
    },
    '.ct-button_2': {
      toggle: '',
      hide: '.ct-element_1, .ct-element_3, .ct-element_4 .ct-element_5',
      show: '.ct-element_2',
    },
    '.ct-button_3': {
      toggle: '',
      hide: '.ct-element_1, .ct-element_2, .ct-element_4 .ct-element_5',
      show: '.ct-element_3',
    },
    '.ct-button_4': {
      toggle: '',
      hide: '.ct-element_1, .ct-element_2, .ct-element_3',
      show: '.ct-element_4',
    },
    '.ct-button_5': {
      toggle: '',
      hide: '.ct-element_1, .ct-element_2, .ct-element_3 .ct-element_4',
      show: '.ct-element_5',
    },
  };

  $.each(buttons, function (button, elements) {
    $(button).click(function (event) {
      event.preventDefault();

      if ($(button).hasClass('ct-button--opened')) {
        return;
      }

      $.each(buttons, function (otherButton, otherElements) {
        if (otherButton !== button) {
          $(otherElements.show).hide();
          $(otherButton).removeClass('ct-button--opened').addClass('ct-button--closed');
        }
      });

      $(elements.show).fadeIn();
      $(button).removeClass('ct-button--closed').addClass('ct-button--opened');
    });
  });
});
