/**
 * @file
 * Handling of AJAX links with a confirmation message.
 *
 * @code
 * <a href="custom/nojs/path" class="use-ajax-confirm">Link with default message</a>
 * <a href="custom/nojs/path" class="use-ajax-confirm" data-use-ajax-confirm-message="Please confirm your action">Link with custom message</a>
 * @endcode
 */

/*global jQuery, Drupal*/

(function ($) {
    'use strict';
    Drupal.behaviors.ajaxConfirmLink = {
        attach: function (context, settings) {
            $('.use-ajax-confirm').filter('a').once('use-ajax-confirm').on('click', function (event) {
                event.stopPropagation();
                var $this = $(this);
                // Allow to provide confirmation message in
                // data-use-ajax-confirm-message element attribute.
                var message = $this.data('use-ajax-confirm-message') || Drupal.t('Are you sure you want to do this?');

                if (confirm(message)) {
                    // Create ajax event only if action was confirmed.
                    var id = $this.attr('id');
                    // Generate unique id, if the element does not already have one.
                    if (!id || id.trim() == '') {
                        id = 'use-ajax-confirm' + new Date().getTime() + Math.floor(Math.random() * 1000);
                        $this.attr('id', id);
                    }

                    Drupal.ajax[id] = new Drupal.ajax(id, this, {
                        // 'nojs' to 'ajax' replacement in path performed by Drupal.ajax().
                        url: $this.attr('href'),
                        event: 'load.use-ajax-confirm'
                    });

                    $this.trigger('load.use-ajax-confirm');
                }

                return false;
            });
        }
    };
}(jQuery));