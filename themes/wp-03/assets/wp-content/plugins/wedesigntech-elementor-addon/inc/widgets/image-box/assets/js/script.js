(function($) {

    const wdtImageBoxWidgetHandler = function($scope) {
        const instance = new wdtImageBoxWidgetHandlerInit($scope);

        if ($scope.data('settings')) {
            const settings = $scope.data('settings');

            if (settings['enable_popup']) {
                instance.init();
            }

            if (settings['enable_hover_class']) {
                instance.hover_active_class();
            }

            if (settings['enable_button_hover_animation'] === 'yes') {
                instance.buttonAnimation();
            }

            function initializeimageanimation() {

                const ids1 = $scope.data('id');
                const img_box_setting = $scope.find('#wdt-image-box-' + ids1).data('settings');

                if (img_box_setting && img_box_setting.enable_image_animation === 'yes') {
                    const selector1 = `#wdt-image-box-${ids1} .wdt-content-image-wrapper .wdt-content-image a`;
                    jQuery(selector1).each(function() {
                        instance.imageAnimation(selector1);
                        jQuery(selector1).addClass('animation-initialized');
                    });
                }
            }

            function initializeimageboxanimation() {
                let uniqueId2 = $scope.get(0).id;

                if (!uniqueId2) {
                    const classes = $scope.get(0).className.split(" ");
                    const idClass = classes.find(cls => cls.startsWith("elementor-element-"));
                    uniqueId2 = idClass ? idClass.replace("elementor-element-", "") : "";
                }

                function createSelector(uniqueId) {
                    var selector = '.wdt-image-box-holder .wdt-content-image-wrapper .wdt-content-image a';
                    if (uniqueId) {
                        selector = `#wdt-image-box-${uniqueId}`;
                    } else {
                        selector = selector;
                    }
                    return selector;
                }

                const settings2 = $scope.data('settings');
                if (settings2['enable_image_animation'] === 'yes') {
                    const selector2 = createSelector(uniqueId2);

                    if (!jQuery(selector2).hasClass('animation-initialized')) {
                        instance.imageBoxAnimation(selector2);
                        jQuery(selector2).addClass('animation-initialized');
                    }
                }
            }

            // Execute Both Functions
            initializeimageanimation();
            initializeimageboxanimation();

        }
    };

    const wdtImageBoxWidgetHandlerInit = function($scope) {

        const $self = this;
        $self.init = function() {

            const $image_box_content_repeater = $scope.find('.wdt-content-image-wrapper');
            $image_box_content_repeater.each(function() {

                const $this_image_box = $(this);
                const $image_url = $this_image_box.find('img').attr('src');
                $self.onClickInit($this_image_box, $image_url);

            });
        };

        $self.onClickInit = function($this_image_box, $image_url) {

            $this_image_box.magnificPopup({
                items: {
                    src: $image_url,
                    type: 'image',
                },
                removalDelay: 500,
                showCloseBtn: true,
                enableEscapeKey: true,
                closeOnBgClick: true,
                mainClass: 'wdt-image-box-popup wdt-popup-box-window',
            });

        };

        $self.hover_active_class = function() {

            var $get_scope_name = $scope.find('.wdt-image-box-holder').hasClass('wdt-carousel-holder');

            if ($get_scope_name) {

                var image_box_wdt_swiper = $scope.find('.wdt-image-box-holder .wdt-image-box-container .wdt-image-box-wrapper .swiper-slide');

                $scope.find('.wdt-image-box-holder .wdt-image-box-container .wdt-image-box-wrapper .swiper-slide:first-child').addClass('wdt-active');
                image_box_wdt_swiper.mouseover(function() {
                    if (!($(this).hasClass('wdt-active'))) {
                        $scope.find('.wdt-image-box-holder .wdt-image-box-container .wdt-image-box-wrapper .swiper-slide').removeClass('wdt-active');
                        $(this).addClass('wdt-active');
                    }
                });

            } else {

                var image_box_wdt_column = $scope.find('.wdt-image-box-holder .wdt-column-wrapper .wdt-column');

                $scope.find('.wdt-image-box-holder .wdt-column-wrapper .wdt-column:first-child').addClass('wdt-active');
                image_box_wdt_column.mouseover(function() {
                    if (!($(this).hasClass('wdt-active'))) {
                        $scope.find('.wdt-image-box-holder .wdt-column-wrapper .wdt-column').removeClass('wdt-active');
                        $(this).addClass('wdt-active');
                    }
                });

            }

        };

        $self.imageAnimation = function(selector) {
            jQuery('body').on('mouseenter', selector, function() {
                var image = jQuery(this).find('img')[0];
                jQuery(image).css({
                    transform: 'translate3d(0, 0, 0)',
                    scale: 1.1,
                });

                jQuery(this).on('mousemove', function(e) {
                    var rect = this.getBoundingClientRect();
                    var relX = e.clientX - rect.left;
                    var relY = e.clientY - rect.top;

                    var moveX = ((rect.width / 2 - relX) / (rect.width / 2)) * 20;
                    var moveY = ((rect.height / 2 - relY) / (rect.height / 2)) * 20;

                    jQuery(image).css({
                        transform: `translate3d(${moveX}px, ${moveY}px, 0)`,
                        scale: 1.1,
                    });
                });
            });

            jQuery('body').on('mouseleave', selector, function() {
                var image = jQuery(this).find('img')[0];

                jQuery(this).off('mousemove');

                jQuery(image).css({
                    transform: 'translate3d(0, 0, 0)',
                    scale: 1,
                });
            });
        };

        $self.imageBoxAnimation = function(selector) {

            jQuery('body').on('mouseenter', selector, function() {

                var image = jQuery(this).find('img')[0];
                if (image) {
                    jQuery(image).css({
                        transform: 'translate3d(0, 0, 0)',
                        scale: 1.1,
                    });
                }

                const mouseMoveHandler = function(e) {
                    const rect = this.getBoundingClientRect();
                    const relX = e.clientX - rect.left;
                    const relY = e.clientY - rect.top;

                    const moveX = ((rect.width / 2 - relX) / (rect.width / 2)) * 20;
                    const moveY = ((rect.height / 2 - relY) / (rect.height / 2)) * 20;

                    if (image) {
                        jQuery(image).css({
                            transform: `translate3d(${moveX}px, ${moveY}px, 0)`,
                            scale: 1.1,
                        });
                    }
                };

                jQuery(this).on('mousemove', mouseMoveHandler);
            });

            jQuery('body').on('mouseleave', selector, function() {

                var image = jQuery(this).find('img')[0];
                jQuery(this).off('mousemove');

                if (image) {
                    jQuery(image).css({
                        transform: 'translate3d(0, 0, 0)',
                        scale: 1,
                    });
                }
            });
        };

        $self.buttonAnimation = function() {

            const buttons = $scope.find('.an-btn, .wdt-content-button a');

            buttons.each(function() {
                const button = $(this).get(0);
                let boundingRect = button.getBoundingClientRect();

                window.addEventListener('resize', () => {
                    boundingRect = button.getBoundingClientRect();
                });

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


    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/wdt-image-box.default', wdtImageBoxWidgetHandler);
    });

})(jQuery);