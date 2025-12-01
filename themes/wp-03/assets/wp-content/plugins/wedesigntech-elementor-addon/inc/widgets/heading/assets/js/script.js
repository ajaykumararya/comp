(function($) {

    const wdtHeadingWidgetHandler = function($scope, $) {

        const $heading_holder = $scope.find('.wdt-heading-holder');
        const $heading_title = $heading_holder.find('.wdt-heading-title');
        const $heading_wrapper = $heading_title.find('.wdt-split-heading-wrapper');
        const $heading_each_span = $heading_wrapper.find('.wdt-split-heading-title');

        $i = '50';
        $.each($heading_each_span, function() {
            $this_element = $(this);
            $this_element.css({
                "transition-delay": $i + 'ms'
            });
            $i = parseInt($i) + 50;
        });

    };

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/wdt-heading.default', wdtHeadingWidgetHandler);
    });

})(jQuery);