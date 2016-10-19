/**
 * echarts统计图的js
 * Created by phoebegl on 2016/10/19.
 */

$(function() {
    var chart;

    $(document).ready(function() {

        var myChart1 = echarts.init(document.getElementById('friendcompare'));
        myChart1.setOption({
            tooltip: {},
            xAxis: {
                data: ["衬衫","羊毛衫","雪纺衫","裤子","高跟鞋","袜子"]
            },
            yAxis: {},
            series: [{
                name: '销量',
                type: 'bar',
                data: [5, 20, 36, 10, 10, 20]
            }]
        });
        var myChart2 = echarts.init(document.getElementById('a'));
        myChart2.setOption({
            tooltip: {},
            xAxis: {
                data: ["衬衫","羊毛衫","雪纺衫","裤子","高跟鞋","袜子"]
            },
            yAxis: {},
            series: [{
                name: '销量',
                type: 'bar',
                data: [5, 20, 36, 10, 10, 20]
            }]
        });
    });
});

var backgroundColor = [
    "#FFFFCC", "#CCFFFF", "#FFCCCC",
    "#99CCCC", "#FFCC99", "#FFCCCC",
    "#FF9999", "#996699", "#FFFF99",
    "#0099CC", "#FF6666", "#99CC66"
];