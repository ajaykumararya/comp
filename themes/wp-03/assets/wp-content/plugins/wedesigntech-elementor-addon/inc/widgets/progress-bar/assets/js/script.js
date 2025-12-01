(function($) {

    const wdtProgressBarWidgetHandler = function($scope, $) {
        const instance = new wdtProgressBarWidgetHandlerInit($scope, $);
        instance.init();
    };

    var wdtProgressBarWidgetHandlerInit = function($scope, $) {

        var $self = this;

        var $this = $scope.find('.wdt-progressbar-container');
        var $settings = $this.data('bar-settings');
        var $module_id = $settings['module_id'];
        var $module_pb_id = $($settings['module_pb_id']).find('.wdt-progressbar')[0];
        var $type = $settings['type'];
        var $percentage = $settings.percentage;
        var $percentage_val = $percentage / 100;
        var $bar_active_thickness = $settings.bar_active_thickness;
        var $bar_inactive_thickness = $settings.bar_inactive_thickness;
        var $bar_active_color = $settings.bar_active_color;
        var $bar_inactive_color = $settings.bar_inactive_color;
        var $enable_gradient = $settings.enable_gradient;
        var $gradient_color = $settings.gradient_color;
        var $percentage_color = $settings.percentage_color;
        var $progress_bar = false;

        $self.init = function() {
            // If the widget is in view port init animation
            if ('IntersectionObserver' in window) {
                let $observer;
                let $observerOptions = {
                    root: null,
                    rootMargin: "0px",
                    threshold: 1
                };

                $observer = new IntersectionObserver($self.initAnimationOnIntersect, $observerOptions);
                $observer.observe($scope[0]);
            }
        }

        $self.initAnimationOnIntersect = function(entries, $observer) {

            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    $self.initAnimation();
                    $observer.unobserve(entry.target)
                }
            });

        }

        $self.initAnimation = function() {

            var $options = {
                color: $bar_active_color,
                strokeWidth: $bar_active_thickness,
                trailColor: $bar_inactive_color,
                trailWidth: $bar_inactive_thickness,
                svgStyle: {
                    display: 'block',
                    width: '100%',
                },
                step: function(state, bar) {
                    if ($type == 'circle' || $type == 'semi-circle') {
                        bar.setText(Math.round(bar.value() * 100) + '<sup class="wdt-progressbar-percentage">%</sup>');
                        if ($type == 'semi-circle') {
                            $this.find('.wdt-progressbar-value').css('transform', 'translateY(-50%)');
                        }
                    } else {
                        var $item = $this.find('.wdt-progressbar-value').html(Math.round(bar.value() * 100) + '<sup class="wdt-progressbar-percentage">%</sup>');
                        if ($this.hasClass('wdt-progressbar-content-floating') || $this.hasClass('wdt-progressbar-content-fixed-along')) {
                            $item.css('left', bar.value() * 100 + '%');
                        }
                    }
                    if ($this.hasClass('wdt-progressbar-content-fixed') || $this.hasClass('wdt-progressbar-content-fixed-along')) {
                        $item.css('height', $scope.find('.wdt-progressbar').outerHeight() + 'px');
                    }
                },
            };

            if ($type == 'circle' || $type == 'semi-circle') {
                $options['text'] = {
                    className: 'wdt-progressbar-value',
                    style: {
                        color: $percentage_color
                    }
                };
            }

            if ($type == 'circle') {
                $progress_bar = new ProgressBar.Circle($module_pb_id, $options);
            } else if ($type == 'semi-circle') {
                $progress_bar = new ProgressBar.SemiCircle($module_pb_id, $options);
            } else {
                $progress_bar = new ProgressBar.Line($module_pb_id, $options);
            }

            if ($progress_bar) {
                if ($enable_gradient) {
                    $self.generateGradient();
                }
                $progress_bar.animate($percentage_val);
            }

        };

        $self.generateGradient = function() {

            var $svgns = 'http://www.w3.org/2000/svg';
            var $defs = document.createElementNS($svgns, 'defs');
            var $gradient = document.createElementNS($svgns, 'linearGradient');

            var $stops = [{
                    'color': $bar_active_color,
                    'offset': '0%',
                },
                {
                    'color': $gradient_color,
                    'offset': '100%',
                },
            ];

            for (var i = 0, length = $stops.length; i < length; i++) {
                var $stop = document.createElementNS($svgns, 'stop');
                $stop.setAttribute('offset', $stops[i].offset);
                $stop.setAttribute('stop-color', $stops[i].color);
                $gradient.appendChild($stop);
            }

            $gradient.id = 'gradient-' + $module_id;
            $gradient.setAttribute('gradientUnits', 'userSpaceOnUse');
            $gradient.setAttribute('x1', '0');
            $gradient.setAttribute('x2', $percentage + '%');
            $gradient.setAttribute('y1', '0');
            $gradient.setAttribute('y2', '0');
            $defs.appendChild($gradient);

            $($module_pb_id).find('svg').append($defs);
            $($module_pb_id).find('svg path:nth-child(2)').attr('stroke', 'url(#gradient-' + $module_id + ')');

        };


    };

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/wdt-progress-bar.default', wdtProgressBarWidgetHandler);
    });

})(jQuery);