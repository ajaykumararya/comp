document.addEventListener('DOMContentLoaded', function () {
    var element = document.getElementById('kt_apexcharts_3');
    const fetch_record = $('.fetch-record');
    var height = parseInt(KTUtil.css(element, 'height'));
    var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
    var borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
    var baseColor = KTUtil.getCssVariableValue('--bs-primary');
    var lightColor = KTUtil.getCssVariableValue('--bs-primary-light');
   

    if (!element) {
        return;
    }

    var options = {
        series: [{
            name: 'New Added',
            data: [0,0,0,0,0,0,0,0,0,0,0,0]
        }],
        chart: {
            fontFamily: 'inherit',
            type: 'area',
            height: height,
            toolbar: {
                show: true
            }
        },
        plotOptions: {

        },
        legend: {
            show: true
        },
        dataLabels: {
            enabled: true
        },
        fill: {
            type: 'solid',
            opacity: 1
        },
        stroke: {
            curve: 'smooth',
            show: true,
            width: 3,
            colors: [baseColor]
        },
        xaxis: {
            categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug','Sep','Oct','Nov','Dec'],
            axisBorder: {
                show: true,
            },
            axisTicks: {
                show: true
            },
            labels: {
                style: {
                    colors: labelColor,
                    fontSize: '12px'
                }
            },
            crosshairs: {
                position: 'front',
                stroke: {
                    color: baseColor,
                    width: 1,
                    dashArray: 3
                }
            },
            tooltip: {
                enabled: true,
                formatter: undefined,
                offsetY: 0,
                style: {
                    fontSize: '12px'
                }
            }
        },
        yaxis: {
            labels: {
                style: {
                    colors: labelColor,
                    fontSize: '12px'
                }
            }
        },
        states: {
            normal: {
                filter: {
                    type: 'none',
                    value: 0
                }
            },
            hover: {
                filter: {
                    type: 'none',
                    value: 0
                }
            },
            active: {
                allowMultipleDataPointsSelection: false,
                filter: {
                    type: 'none',
                    value: 0
                }
            }
        },
        tooltip: {
            style: {
                fontSize: '12px'
            },
            y: {
                formatter: function (val) {
                    return '👨‍🎓 ' + val + ' Student(s)'
                }
            }
        },
        colors: [lightColor],
        grid: {
            borderColor: borderColor,
            strokeDashArray: 4,
            yaxis: {
                lines: {
                    show: true
                }
            }
        },
        markers: {
            strokeColor: baseColor,
            strokeWidth: 3
        }
    };

    var chart = new ApexCharts(element, options);
    chart.render();
    fetch_record.on('change', e => {
        console.log('change event triggered');
        var year = $(e.target).val();
        // alert(year);
        $.AryaAjax({
            url : 'center/get-student-record',
            data : {year}
        }).then((ree) => {
            showResponseError(ree)
            // chart.updateSeries([{
            //     data: ree.data
            // }]);
            chart.updateSeries([{
                    data: Object.values(ree.data)
                }]
            );
        });
    })

    fetch_record.trigger('change');
})