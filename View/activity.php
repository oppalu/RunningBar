<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>最新活动</title>

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
        <section class="content-header">
            <h1>活动管理</h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="col-sm-6">
                                <img width="70%" height="70%" class="img-responsive img-circle" src="../public/img/avatar.png">
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
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">最新活动</h3>
                        </div>
                        <div class="box-body">
                            <ul>
                                <!--类型,名称,时间,已参与人数,状态-->
                                <li class="col-md-12">
                                    <div class="col-sm-1">
                                        <img style="width: 100%;" class="img-circle" src="../public/img/single.png">
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="activity_info.php">
                                            <h4>绿色长征</h4>
                                        </a>
                                        <label class="label-success">进行中</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>2016-10-1 - 2016-10-30</label>
                                    </div>
                                    <div class="col-sm-4 pull-right">
                                        <label>已参与人数:12345</label>
                                    </div>
                                    <hr class="col-sm-12" size="10">
                                </li>
                                <li class="col-md-12">
                                    <div class="col-sm-1">
                                        <img style="width: 100%;" class="img-circle" src="../public/img/team.jpg">
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="activity_info.php">
                                            <h4>马拉松</h4>
                                        </a>
                                        <label class="label-danger">已结束</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>2016-10-01 - 2016-10-10</label>
                                    </div>
                                    <div class="col-sm-4 pull-right">
                                        <label>已参与人数:12345</label>
                                    </div>
                                    <hr class="col-sm-12" size="10">
                                </li>
                            </ul>
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
