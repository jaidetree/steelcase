
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'graphBox3',
                type: 'column'
            },
            title: {
                text: 'Average Time Taken per Module'
            },
            xAxis: {
                categories: [
                    'module',
                    
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Time Taken (minutes)'
                }
            },
            legend: {
                layout: 'vertical',
                backgroundColor: '#FFFFFF',
                align: 'left',
                verticalAlign: 'top',
                x: 100,
                y: 70,
                floating: true,
                shadow: true
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ this.y +' mm';
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
                series: [{
                name: 'Safety',
                data: [5 ]
    
            }, {
                name: 'Principals',
                data: [6 ]
    
            }, {
                name: 'Side prep',
                data: [2 ]
    
            }, {
                name: 'Load prep',
                data: [8]
			}, {
                name: 'Loading',
                data: [15]
    
            }]
        });
    });
