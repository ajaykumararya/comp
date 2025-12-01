(function($) {

    const wdtButtonWidgetHandler = function($scope) {
        const instance = new wdtButtonWidgetHandlerInit($scope);

        if ($scope.find('.wdt-button-holder').data('settings')) {
            const settings = $scope.find('.wdt-button-holder').data('settings');
            if (settings['enable_button_hover_animation'] == 'yes') {
                instance.buttonHoverAnimation();
            }
        }
    };

    const wdtButtonWidgetHandlerInit = function($scope) {

        const $self = this;

        $self.buttonHoverAnimation = function() {
            const buttons = $scope.find('.an-btn, .wdt-content-button a');

            buttons.each(function() {
                const button = $(this).get(0);
                let boundingRect = button.getBoundingClientRect();

                // Recalculate boundingRect on window resize
                window.addEventListener('resize', () => {
                    boundingRect = button.getBoundingClientRect();
                });

                // Handle mouse move event for hover animation
                button.addEventListener('mousemove', (e) => {
                    const mousePosX = e.clientX - boundingRect.left;
                    const mousePosY = e.clientY - boundingRect.top;

                    const clampedPosX = Math.max(0, Math.min(mousePosX, boundingRect.width));
                    const clampedPosY = Math.max(0, Math.min(mousePosY, boundingRect.height));

                    const movementMultiplierX = 0.15;
                    const movementMultiplierY = 0.25;

                    try {
                        gsap.to(button, {
                            x: (clampedPosX - boundingRect.width / 2) * movementMultiplierX,
                            y: (clampedPosY - boundingRect.height / 2) * movementMultiplierY,
                            duration: 0.3,
                            ease: Power2.easeOut,
                        });
                    } catch (error) {
                        console.error('GSAP animation error:', error);
                    }
                });

                // Reset animation on mouse leave
                button.addEventListener('mouseleave', () => {
                    gsap.to(button, {
                        x: 0,
                        y: 0,
                        duration: 0.3,
                        ease: Power2.easeOut,
                    });
                });
            });
        };
    };

    // Hook into Elementor frontend initialization
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/wdt-button.default', wdtButtonWidgetHandler);
    });

})(jQuery);