
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'graphBox2',
                type: 'column'
            },
            title: {
                text: 'Average Score per Module'
            },
            xAxis: {
                categories: [
                    'module',
                    
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Score'
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
                data: [49.9 ]
    
            }, {
                name: 'Principals',
                data: [83.6 ]
    
            }, {
                name: 'Side prep',
                data: [48.9 ]
    
            }, {
                name: 'Load prep',
                data: [42.4]
			}, {
                name: 'Loading',
                data: [50.4]
    
            }]
        });
    });
