<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的活动</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="common/assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="common/assets/css/App.css">
    <link rel="stylesheet" href="common/assets/css/skins/allskins.css">

    <script src="common/assets/js/jquery.min.js"></script>
    <script src="common/assets/js/bootstrap.min.js"></script>
    <script src="common/assets/js/app.js"></script>

</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <?php include("common/header.html");?>

    <!--中心界面部分-->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>活动管理</h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="col-sm-6">
                                <img width="70%" height="70%" class="img-responsive img-circle" src="common/assets/img/avatar.png">
                            </div>
                            <div class="col-sm-6">
                                <h3>Jessica</h3>
                                <p class="text-muted">LV1</p>
                            </div>
                            <div class="col-sm-8">
                                <a href="activity_add.php" class="btn btn-primary btn-block"><b>发起活动</b></a>
                            </div>
                            <div class="col-sm-4">
                                <a href="#">规则介绍</a>
                            </div>
                        </div>
                        <!--box-body-->
                    </div>
                    <!--box-->
                </div>
                <!--col-md-2-->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#join" data-toggle="tab">我的战绩</a></li>
                            <li><a href="#own" data-toggle="tab">管理我的活动</a></li>
                        </ul>

                        <div class="tab-content">
                            <!--我参与的活动列表tab-->
                            <div class="tab-pane active" id="join">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <ul>
                                            <li class="col-md-12">
                                                <div class="col-sm-1">
                                                    <img style="width: 100%;" class="img-circle" src="common/assets/img/team.jpg">
                                                </div>
                                                <div class="col-sm-3">
                                                    <a href="activity_joined.php">
                                                        <h4>马拉松</h4>
                                                    </a>
                                                    <label class="label-success">挑战成功</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>10.0公里</label>
                                                </div>
                                                <div class="col-sm-4 pull-right">
                                                    <label>排名:第1000名</label>
                                                </div>
                                                <hr class="col-sm-12" size="10">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--我的活动列表tab-->
                            <div class="tab-pane" id="own">

                            </div>
                        </div>
                    </div>
                </div>
                <!--col-md-10-->
            </div>
            <!--row-->
        </section>
    </div>

    <?php include("common/footer.html");?>
</div>
</body>
</html>