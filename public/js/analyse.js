// $(document).ready(function () {
//     $.getJSON('/user/show',function(data){
//         document.getElementById('sname').innerHTML =data.username;
//         var path = "";
//         if(data.avatar != null) {
//             path = '../'+data.avatar;
//         }
//         $('#simage').attr('src',path);
//         document.getElementById('slevel').innerHTML = 'LV'+data.level;
//         document.getElementById('sfollower').innerHTML = data.followerNum;
//         document.getElementById('sfollowing').innerHTML = data.followingNum;
//         document.getElementById('splace').innerHTML = data.location;
//         document.getElementById('shobby').innerHTML = data.interest;
//         document.getElementById('sslogen').innerHTML = data.slogen;
//     });
//
//     $.getJSON('/getsport',function(data){
//         document.getElementById('registerday').innerHTML = data.registerday;
//         document.getElementById('totalwalk').innerHTML = (data.totalwalk==null ? 0 : data.totalwalk);
//         document.getElementById('totalrun').innerHTML = (data.totalrun==null ? 0 : data.totalrun);
//         document.getElementById('calories').innerHTML = data.calories;
//         document.getElementById('equal').innerHTML = data.analyse;
//     });
//
//     $.getJSON('/getRank',function(data){
//         document.getElementById('friendnum').innerHTML = data.friendnum;
//         document.getElementById('walkrank').innerHTML = data.walkrank;
//         document.getElementById('runrank').innerHTML = data.runrank;
//     });
// });
// $(document).ready(function() {
//
    var myChart1 = echarts.init(document.getElementById('friendcompare'));
    myChart1 .showLoading({
        text : 'Loading...',
        effect : 'spin',
        textStyle : {
            fontSize : 25
        }
    });
    myChart1.setOption({
        tooltip: {
            trigger: 'axis'
        },
        toolbox: {
            feature: {
                dataView: {show: true, readOnly: false},
                magicType: {show: true, type: ['line', 'bar']},
                restore: {show: true},
                saveAsImage: {show: true}
            }
        },
        legend: {
            data:['蒸发量','降水量','平均温度']
        },
        xAxis: [
            {
                type: 'category',
                data: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']
            }
        ],
        yAxis: [
            {
                type: 'value',
                name: '水量',
                min: 0,
                max: 250,
                interval: 50,
                axisLabel: {
                    formatter: '{value} ml'
                }
            },
            {
                type: 'value',
                name: '温度',
                min: 0,
                max: 25,
                interval: 5,
                axisLabel: {
                    formatter: '{value} °C'
                }
            }
        ],
        series: [
            {
                name:'蒸发量',
                type:'bar',
                data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
            },
            {
                name:'降水量',
                type:'bar',
                data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3]
            }
        ]
    });
//     // $.ajax('/rankChart', {
//     //     type: 'GET',
//     //     success: function (data, textStatus) {
//     //         myChart1.hideLoading();
//     //         myChart1.setOption({
//     //             // tooltip : {},
//     //             // legend: {
//     //             //     data:['跑步','步行']
//     //             // },
//     //             // xAxis: {
//     //             //     data: data.username
//     //             // },
//     //             // yAxis: {},
//     //             // series: [
//     //             //     {
//     //             //         name: '跑步',
//     //             //         type: 'bar',
//     //             //         data: data.walk
//     //             //     },
//     //             //     {
//     //             //         name: '步行',
//     //             //         type: 'bar',
//     //             //         data: data.run
//     //             //     }
//     //             // ]
// });