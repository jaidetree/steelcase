
    var chart;

    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'graphBox1',
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Improvment Over Time',
                x: -20 //center
            },
            subtitle: {
                text: 'Steelcase training',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Overall Score'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +'°C';
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [{
                name: 'Safety',
                data: [75, 60, 56, 57, 56, 67, 78, 78, 80.3, 89.3, 100, 96]
            }, {
                name: 'Principals',
                data: [15, 80, 75, 100, 70, 22, 87, 56, 12, 78, 86, 25]
			}, {
                name: 'Side prep',
                data: [2, 80, 75, 100, 70, 56, 67, 78, 89, 90, 90, 90]
            }, {
                name: 'Load prep',
                data: [90, 89, 78, 67, 56, 45, 56, 67, 43, 90, 39, 10]
            }, {
                name: 'Loading',
                data: [39, 42, 57, 85, 19, 12, 70, 66, 42, 13, 66, 48]
				
            }]
        });
    });
