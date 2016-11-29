<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>活动具体信息</title>

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
            getAcInfo();
            getParticipaters();
        });
        function getAcInfo() {
            $.getJSON('/activity',function(data){
                if(data.type == 'single')
                    $('#actimage').attr('src',"../public/img/single.png");
                else
                    $('#actimage').attr('src',"../public/img/single.png");
                document.getElementById('actname').innerHTML = data.name;
                document.getElementById('actgoal').innerHTML += data.goal;
                document.getElementById('actcreate').innerHTML = data.username;
                document.getElementById('acttime').innerHTML = (data.starttime+'至'+data.endtime);
                document.getElementById('actintro').innerHTML = data.introduction;

                if(data.isJoin) {
                    $('#acti').attr('class',"btn btn-danger btn-block");
                    $('#acti').attr('href',"/quit");
                    document.getElementById('acti').innerHTML = '<b>退出活动</b>';
                } else {
                    $('#acti').attr('class',"btn btn-primary btn-block");
                    $('#acti').attr('href',"/join");
                    document.getElementById('acti').innerHTML = '<b>参与活动</b>';
                }
            });
        }
        function getParticipaters() {
            $.getJSON('/getParcipater',function(data){
                var ul = document.getElementById('participaters');
                $.each(data,function (entryindex,entry) {
                    var id = entry['userid'];
                    var name = entry['username'];
                    var sex = entry['sex'];
                    var location = entry['location'];
                    var finish = entry['finish'];
                    var path = "";
                    if(entry['avatar'] != null)
                        path = "../"+entry['avatar'];

                    var single = '<li class="col-md-12"><hr class="col-sm-12" size="10"><div class="col-sm-2">';
                    single += '<img style="width: 80%;height: 80% " src="'+path+'" class="img-circle"></div>';
                    single += '<div class="col-sm-3"><a href="#"><b>'+name+'</b></a><br><label>'+sex+'</label><br>';
                    single += '<label>'+location+'</label></div><div class="pull-right"><label><h3>共完成</h3></label><br>';
                    single += '<label style="font-size: large"><font color="#ff69b4">'+finish+'</font></label><label style="font-size: large"><strong>公里</strong></label></div></li>';
                    ul.innerHTML += single;
                })
            });
        }
    </script>

</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <?php include("common/header.html");?>

    <!--中心界面部分-->
    <div class="content-wrapper">
        <!--发起者、参与者列表、目标、类型、时间、简介-->
        <section class="content-header">
            <h1>挑战详情</h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="col-sm-6">
                                <img width="60%" height="60%" class="center-block img-responsive img-circle" id="actimage">
                            </div>
                            <div class="col-sm-6">
                                <h3 id="actname" class="text-center"></h3>
                                <h3 id="actgoal" class="text-center">目标公里数:</h3>
                                <hr>
                            </div>
                            <div class="col-sm-12">
                                <strong>发起用户:</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span id="actcreate" class="text-muted "></span>
                                <hr>

                                <strong>活动时间:</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span id="acttime" class="text-muted "></span>
                                <hr>

                                <strong>活动简介</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span id="actintro" class="text-muted "></span>
                                <hr>

                                <a id="acti"></a>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!--col-md-4-->
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h2>排行榜</h2>
                        </div>
                        <div class="box-body">
                            <ul id="participaters"></ul>
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
