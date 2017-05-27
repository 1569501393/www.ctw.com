
/**
* Theme: Ubold Admin Template
* Author: Coderthemes
* Morris Chart
*/

!function($) {
    "use strict";

    var MorrisCharts = function() {};

    //creates line chart
    MorrisCharts.prototype.createLineChart = function(element, data, xkey, ykeys, labels, opacity, Pfillcolor, Pstockcolor, lineColors) {
        Morris.Line({
          element: element,
          data: data,
          xkey: xkey,
          ykeys: ykeys,
          labels: labels,
          fillOpacity: opacity,
          pointFillColors: Pfillcolor,
          pointStrokeColors: Pstockcolor,
          behaveLikeLine: true,
          gridLineColor: '#eef0f2',
          hideHover: 'auto',
          resize: true, //defaulted to true
          lineColors: lineColors
        });
    },
    //creates area chart
    MorrisCharts.prototype.createAreaChart = function(element, pointSize, lineWidth, data, xkey, ykeys, labels, lineColors) {
        Morris.Area({
            element: element,
            pointSize: 0,
            lineWidth: 0,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true,
            gridLineColor: '#eef0f2',
            lineColors: lineColors
        });
    },
    //creates area chart with dotted
    MorrisCharts.prototype.createAreaChartDotted = function(element, pointSize, lineWidth, data, xkey, ykeys, labels, Pfillcolor, Pstockcolor, lineColors) {
        Morris.Area({
            element: element,
            pointSize: 3,
            lineWidth: 1,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            pointFillColors: Pfillcolor,
            pointStrokeColors: Pstockcolor,
            resize: true,
            gridLineColor: '#eef0f2',
            lineColors: lineColors
        });
    },
    //creates Bar chart
    MorrisCharts.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barColors: lineColors
        });
    },
    //creates Stacked chart
    MorrisCharts.prototype.createStackedChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            stacked: true,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barColors: lineColors
        });
    },
    //creates Donut chart
    MorrisCharts.prototype.createDonutChart = function(element, data, colors) {
        Morris.Donut({
            element: element,
            data: data,
            resize: true, //defaulted to true
            colors: colors
        });
    },
    MorrisCharts.prototype.init = function() {

        //create line chart
        var $data  = [
            { y: '2月', a: 30,  b: 20 , c: 10 },
            { y: '3月', a: 50,  b: 40 , c: 30 },
            { y: '4月', a: 75,  b: 65 , c: 50 },
            { y: '5月', a: 50,  b: 40 , c: 22 },
            { y: '6月', a: 75,  b: 65 , c: 50 },
            { y: '7月', a: 100, b: 90 , c: 65 }
          ];
        this.createLineChart('morris-line-example', $data, 'y', ['a', 'b','c'], ['日用品2', '家用电器', '食品'],['0.1'],['#ffffff'],['#999999'], ['#36404a', '#5fbeaa', '#5d9cec']);


        //creating area chart with dotted
        var $areaDotData = [
                { y: '1月', a: 10, b: 20 },
                { y: '2月', a: 75,  b: 65 },
                { y: '3月', a: 50,  b: 40 },
                { y: '4月', a: 75,  b: 65 },
                { y: '5月', a: 50,  b: 40 },
                { y: '6月', a: 75,  b: 65 },
                { y: '7月', a: 90, b: 60 }
            ];
        this.createAreaChartDotted('morris-area-with-dotted', 0, 0, $areaDotData, 'y', ['a', 'b'], ['日用品', '家用电器'],['#ffffff'],['#999999'], ['#36404a', '#5d9cec']);

        //creating bar chart
        var $barData  = [
            { y: '1月', a: 100, b: 90 , c: 40 },
            { y: '2月', a: 75,  b: 65 , c: 20 },
            { y: '3月', a: 50,  b: 40 , c: 50 },
            { y: '4月', a: 75,  b: 65 , c: 95 },
            { y: '5月', a: 50,  b: 40 , c: 22 },
            { y: '6月', a: 75,  b: 65 , c: 56 },
            { y: '7月', a: 100, b: 90 , c: 60 }
        ];
        this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b', 'c'], ['日用品', '家用电器', '食品'], ['#5fbeaa', '#5d9cec', '#ebeff2']);

        //creating Stacked chart
        var $stckedData  = [
            { y: '9月', a: 45, b: 180 },
            { y: '10月', a: 75,  b: 65 },
            { y: '11月', a: 100, b: 90 },
            { y: '12月', a: 75,  b: 65 },
            { y: '1月', a: 100, b: 90 },
            { y: '2月', a: 75,  b: 65 },
            { y: '3月', a: 50,  b: 40 },
            { y: '4月', a: 75,  b: 65 },
            { y: '5月', a: 50,  b: 40 },
            { y: '6月', a: 75,  b: 65 },
            { y: '7月', a: 100, b: 90 }
        ];
        this.createStackedChart('morris-bar-stacked', $stckedData, 'y', ['a', 'b'], ['日用品', '家用电器'], ['#5d9cec', '#ebeff2']);

        //creating donut chart
        var $donutData = [
                {label: "Download Sales", value: 12},
                {label: "In-Store Sales", value: 30},
                {label: "Mail-Order Sales", value: 20}
            ];
        this.createDonutChart('morris-donut-example', $donutData, ['#ebeff2', '#5fbeaa', '#5d9cec']);
    },
    //init
    $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.MorrisCharts.init();
}(window.jQuery);