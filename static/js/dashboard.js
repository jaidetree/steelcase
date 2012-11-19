// JavaScript Document
$(function () {
	var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Average Lesson Scores',
                x: -20 //center
            },
            xAxis: {
                categories: ['Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: '%'
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
                        this.x +': '+ this.y +'%';
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
                data: [84.5, 86.3, 78.3, 83.9, 89.6]
            }, {
                name: 'Dos and Donts',
                data: [82.5, 85.3, 89.3, 90.9, 91.6]
            }, {
                name: 'Materials',
                data: [80.5, 84.3, 87.3, 91.9, 92.6]
            }, {
                name: 'Preloading',
                data: [83.5, 85.3, 85.3, 92.9, 93.6]
            }, {
                name: 'Loading',
                data: [78.5, 86.3, 84.3, 93.9, 94.6]
            }]
        });
    });
    
});