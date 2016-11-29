<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>历史数据分析</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../public/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../public/css/App.css">
    <link rel="stylesheet" href="../public/css/skins/allskins.css">

    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/app.js"></script>
    <script src="../public/js/echarts.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            getAInfo();
            initSport();
            initRank();
            rankChart();
        });
        function getAInfo() {
            $.getJSON('/user/show',function(data){
                document.getElementById('sname').innerHTML =data.username;
                var path = "";
                if(data.avatar != null) {
                    path = '../'+data.avatar;
                }
                $('#simage').attr('src',path);
                document.getElementById('slevel').innerHTML = 'LV'+data.level;
                document.getElementById('sfollower').innerHTML = data.followerNum;
                document.getElementById('sfollowing').innerHTML = data.followingNum;
                document.getElementById('splace').innerHTML = data.location;
                document.getElementById('shobby').innerHTML = data.interest;
                document.getElementById('sslogen').innerHTML = data.slogen;
            });
        }

        function initSport() {
            $.getJSON('/getsport',function(data){
                document.getElementById('registerday').innerHTML = data.registerday;
                document.getElementById('totalwalk').innerHTML = (data.totalwalk==null ? 0 : data.totalwalk);
                document.getElementById('totalrun').innerHTML = (data.totalrun==null ? 0 : data.totalrun);
                document.getElementById('calories').innerHTML = data.calories;
                document.getElementById('equal').innerHTML = data.analyse;
            });
        }

        function initRank() {
            $.getJSON('/getRank',function(data){
                document.getElementById('friendnum').innerHTML = data.friendnum;
                document.getElementById('walkrank').innerHTML = data.walkrank;
                document.getElementById('runrank').innerHTML = data.runrank;
            });
        }

        function rankChart() {
            var myChart1 = echarts.init(document.getElementById('friendcompare'));
            $.getJSON('/rankChart',function(data){
                myChart1.setOption({
                    tooltip : {},
                    legend: {
                        data:['跑步','步行']
                    },
                    xAxis: {
                        data: data.username
                    },
                    yAxis: {},
                    series: [
                        {
                            name: '跑步',
                            type: 'bar',
                            data: data.run
                        },
                        {
                            name: '步行',
                            type: 'bar',
                            data: data.walk
                        }
                    ]
                });
            });
        }
    </script>

</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <?php include("common/header.html");?>

    <!--中心界面部分-->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>历史数据分析</h1>
        </section>
        <section class="content">
            <div class="row">
                <!--个人基本信息部分,姓名、粉丝数、好友数、动态数、等级、所在地。。。-->
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-body">
                            <img id="simage" width="80%" height="80%" class="center-block img-responsive img-circle">
                            <h3 id="sname" class="text-center"></h3>
                            <p id="slevel" class="text-muted text-center"></p>

                            <ul class="list-group">
                                <li class="list-group-item">
                                    <b>粉丝数</b>
                                    <a id="sfollower" class="pull-right"></a>
                                </li>
                                <li class="list-group-item">
                                    <b>关注的人数</b>
                                    <a id="sfollowing" class="pull-right"></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="/myDynamics">动态</a>
                                </li>
                            </ul>
                        </div>
                        <!--box-body-->
                    </div>
                </div>
                <!--col-md-3-->

                <div class="col-md-9">
                    <!--①加入runningbar xxx天以来，共跑步了xxx公里，步行了。。步，共消耗了xxx卡路里，相当于。。。-->
                    <div class="box box-primary">
                        <div class="box-body">
                            <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">自从加入Running Bar&nbsp;</span>
                            <span id="registerday" style="font-family:Microsoft YaHei;font-weight:500;font-size:24px;opacity:1"></span>
                            <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">天以来,</span>
                            <p style="padding-left:20px">
                                <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">你一共跑步了</span>
                                <span id="totalrun" style="font-family:Microsoft YaHei;font-weight:500;font-size:24px;opacity:1"></span>
                                <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">公里,步行了</span>
                                <span id="totalwalk" style="font-family:Microsoft YaHei;font-weight:500;font-size:24px;opacity:1"></span>
                                <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">公里,</span>
                            </p>
                            <p style="padding-left:40px">
                                <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">一共消耗了</span>
                                <span id="calories" style="font-family:Microsoft YaHei;font-weight:500;font-size:24px;opacity:1"></span>
                                <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">千卡,相当于</span>
                                <span id="equal" style="font-family:Microsoft YaHei;color: #ac2925;font-weight:500;font-size:24px;opacity:1"></span>
                            </p>
                        </div>
                    </div>
                    <!--②排名情况，好友中排名情况,左边写排名,右边是当月所有好友运动情况柱状图-->
                    <div class="box box-danger">
                        <div class="box-body">
                            <div class="col-md-6 col-sm-6">
                                <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">你一共有&nbsp;</span>
                                <span id="friendnum" style="font-family:Microsoft YaHei;font-weight:500;font-size:24px;opacity:1"></span>
                                <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">位好友,</span>
                                <p style="padding-left:20px">
                                    <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">在最近的一周内,您的累计步行量在好友中排名第</span>
                                    <span id="walkrank" style="font-family:Microsoft YaHei;font-weight:500;font-size:24px;opacity:1"></span>
                                    <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">位</span>
                                </p>
                                <p style="padding-left:40px">
                                    <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">在最近的一周内,您的累计跑步量在好友中排名第</span>
                                    <span id="runrank" style="font-family:Microsoft YaHei;font-weight:500;font-size:24px;opacity:1"></span>
                                    <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">位</span>
                                </p>
                            </div>
                            <!--统计图部分-->
                            <div class="col-md-6 col-sm-6">
                                <div id="friendcompare" style="width: 100%;height:350px;"></div>
                            </div>
                        </div>
                    </div>
                    <!--②统计图：单日最佳写在左边,最近一周、一月、所有每天运动情况（包括步行和跑步）-->
                    <div class="box box-warning">
                        <div class="box-body">
                            <div class="col-md-6 col-sm-6">
                                <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">这是没写完的其他统计图部分</span>
                            </div>
                            <!--统计图部分-->
                            <div class="col-md-6 col-sm-6">
                                <div id="a" style="width: 100%;height:400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include("common/footer.html");?>
</div>
</body>
</html>
