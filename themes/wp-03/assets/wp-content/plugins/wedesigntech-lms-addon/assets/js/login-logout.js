var dtLMSLoginLogout = {

    dtInit: function() {

        jQuery('body').delegate('.dtlms-login-link', 'click', function(e) {

            jQuery.ajax({
                type: "POST",
                url: lmsfrontendobject.ajaxurl,
                data: {
                    action: 'dtlms_show_login_form_popup',
                },
                success: function(response) {

                    jQuery('body').find('.dtlms-login-form-container').remove();
                    jQuery('body').find('.dtlms-login-form-overlay').remove();
                    jQuery('body').append(response);

                    jQuery('#user_login').focus();

                }
            });

            e.preventDefault();

        });

        jQuery('body').delegate('.dtlms-login-form-overlay', 'click', function(e) {

            jQuery('body').find('.dtlms-login-form-container').fadeOut();
            jQuery('body').find('.dtlms-login-form-overlay').fadeOut();

            e.preventDefault;

        });

    }

};

jQuery(document).ready(function() {

    if (!lmsfrontendobject.elementorPreviewMode) {
        dtLMSLoginLogout.dtInit();
    }

});

(function($) {

    var dtLMSLoginLogoutJs = function($scope, $) {
        dtLMSLoginLogout.dtInit();
    };

    $(window).on('elementor/frontend/init', function() {
        if (lmsfrontendobject.elementorPreviewMode) {
            elementorFrontend.hooks.addAction('frontend/element_ready/dtlms-widget-default-login-logout-links.default', dtLMSLoginLogoutJs);
        }
    });

})(jQuery);