<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>已加入的活动</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../public/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../public/css/App.css">
    <link rel="stylesheet" href="../public/css/skins/allskins.css">

    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/app.js"></script>

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
                                <img width="60%" height="60%" class="center-block img-responsive img-circle" src="../public/img/single.png">
                            </div>
                            <div class="col-sm-6">
                                <h3 class="text-center">绿色长征</h3>
                                <h3 class="text-center">目标:3公里</h3>
                                <hr>
                            </div>
                            <div class="col-sm-12">

                                <strong>活动时间:</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="text-muted ">2016-10-01至2016-10-30</span>
                                <hr>

                                <strong>活动简介</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="text-muted ">健走捐树的众筹活动</span>
                                <hr>

                                <strong>已完成:</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="text-muted ">1.5公里</span>
                                <label class="label-success">挑战成功</label>
                                <hr>

                                <strong>排名</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="text-muted ">1000名</span>
                                <hr>

                                <a href="#" class="btn btn-primary btn-block"><b>继续挑战</b></a>
                                <a href="#" class="btn btn-danger btn-block"><b>退出挑战</b></a>
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
                            <ul>
                                <li class="col-md-12">
                                    <hr class="col-sm-12" size="10">
                                    <div class="col-sm-2">
                                        <img style="width: 80%;height: 80% " src="../public/img/avatar2.png" class="img-circle">
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="#"><b>Phoebe</b></a><br>
                                        <label>女</label><br>
                                        <label>江苏 徐州</label>
                                    </div>
                                    <div class="pull-right">
                                        <label><h3>共完成</h3></label><br>
                                        <label style="font-size: large">
                                            <font color="#ff69b4">
                                                1.0
                                            </font>
                                        </label>
                                        <label style="font-size: large"><strong>公里</strong></label>
                                    </div>
                                </li>
                            </ul>
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
