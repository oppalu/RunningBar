<!--<a href="#" class="btn btn-primary btn-block"><b>关注</b></a>-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人运动信息展示</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../public/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../public/css/App.css">
    <link rel="stylesheet" href="../public/css/skins/allskins.css">

    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/app.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            getFInfo();
            initFSports();
        });
        function getFInfo() {
            $.getJSON('/friend/show',function(data){
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

                var dic = document.getElementById('adddd');

                if(data.isFriend == 0) {
                    var single = '<form method="post" action="/addFriend"><div class="col-sm-12">';
                    single += '<input type="hidden" name="friendid" value="'+data.userid+'"/>';
                    single +='<button type="submit" class="btn btn-primary btn-block">关注</button></div></form>';

                    dic.innerHTML +=single;
                } else {
                    var single = '<form method="post" action="/deleteFriend"><div class="col-sm-12">';
                    single += '<input type="hidden" name="friendid" value="'+data.userid+'"/>';
                    single +='<button type="submit" class="btn btn-primary btn-block">取消关注</button></div></form>';

                    dic.innerHTML +=single;
                }
            });
        }

        function initFSports() {
            $.getJSON('/getfsport',function(data){
                document.getElementById('registerday').innerHTML = data.registerday;
                document.getElementById('todaywalk').innerHTML = (data.todaywalk==null ? 0 : data.todaywalk);
                document.getElementById('todayrun').innerHTML = (data.todayrun==null ? 0 : data.todayrun);
                document.getElementById('totalwalk').innerHTML = (data.totalwalk==null ? 0 : data.totalwalk);
                document.getElementById('totalrun').innerHTML = (data.totalrun==null ? 0 : data.totalrun);
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
            <h1>运动数据展示</h1>
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

                            <ul id="adddd" class="list-group">
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
                <!--勋章馆、累计步行，今日情况;累计跑步，今日情况;累计天数;-->
                <div class="col-md-9">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">个人信息</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong>所在地</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                            <span id="splace" class="text-muted "></span>
                            <hr>

                            <strong>爱好</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                            <span id="shobby" class="text-muted "></span>
                            <hr>

                            <strong>运动宣言</strong>
                            <p id="sslogen"></p>
                        </div>
                    </div>
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">运动信息</h3>
                        </div>

                        <div class="box-body">
                            <div>
                                <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">加入Running Bar共</span>
                                <span id="registerday" style="font-family:Microsoft YaHei;font-weight:500;font-size:24px;opacity:1"></span>
                                <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">天</span>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="col-sm-offset-2 col-md-offset-2 col-md-4 col-sm-4">
                                    <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">今日步数</span>
                                    <span id="todaywalk" style="font-family:Microsoft YaHei;font-weight:500;font-size:24px;opacity:1"></span>
                                    <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">公里</span>
                                </div>

                                <div class="col-sm-offset-2 col-md-offset-2 col-md-4 col-sm-4">
                                    <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">累计步行</span>
                                    <span id="totalwalk" style="font-family:Microsoft YaHei;font-weight:500;font-size:24px;opacity:1"></span>
                                    <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">公里</span>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="col-sm-offset-2 col-md-offset-2 col-md-4 col-sm-4">
                                    <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">今日跑步</span>
                                    <span id="todayrun" style="font-family:Microsoft YaHei;font-weight:500;font-size:24px;opacity:1"></span>
                                    <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">公里</span>
                                </div>

                                <div class="col-sm-offset-2 col-md-offset-2 col-md-4 col-sm-4">
                                    <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">累计跑步</span>
                                    <span id="totalrun" style="font-family:Microsoft YaHei;font-weight:500;font-size:24px;opacity:1"></span>
                                    <span style="font-family:Microsoft YaHei;font-weight:400;font-size:16px;opacity:0.8">公里</span>
                                </div>
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
