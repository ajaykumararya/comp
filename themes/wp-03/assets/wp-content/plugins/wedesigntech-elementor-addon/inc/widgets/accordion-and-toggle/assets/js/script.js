(function($) {

    const wdtAccordionToggleWidgetHandler = function($scope, $) {

        // Accordion
        const $accordionItem = $scope.find('.wdt-accordion-toggle-holder.wdt-module-accordion');
        const $options = {
            header: '.wdt-accordion-toggle-wrapper > .wdt-accordion-toggle-title-holder',
            animate: 'swing',
            collapsible: false,
            active: 0,
            heightStyle: 'content',
            icons: ''
        };
        $accordionItem.accordion($options);

        // Toggle
        const $toggleItem = $scope.find('.wdt-accordion-toggle-holder.wdt-module-toggle');
        const $toggleItemTitleHolder = $toggleItem.find('.wdt-accordion-toggle-title-holder');
        const $toggleItemContentHolder = $toggleItem.find('.wdt-accordion-toggle-description');

        $toggleItem.addClass('accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset');
        $toggleItemTitleHolder.addClass('ui-accordion-header ui-state-default ui-corner-top ui-corner-bottom');
        $toggleItemContentHolder.addClass('ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom').hide();

        $toggleItemTitleHolder.hover(
            function() {
                $(this).toggleClass('ui-state-hover');
            }
        );

        $toggleItemTitleHolder.on(
            'click',
            function() {
                $(this).toggleClass('ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom');
                $(this).next().toggleClass('ui-accordion-content-active').slideToggle(400);
            }
        );

    };

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/wdt-accordion-and-toggle.default', wdtAccordionToggleWidgetHandler);
    });

})(jQuery);