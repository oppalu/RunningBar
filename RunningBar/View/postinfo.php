<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>动态具体信息</title>

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
        <section class="content">
            <div class="box box-default">
                <div class="box-body">
                    <div class="post">
                        <div class="user-block">
                            <div class="col-md-1">
                                <img style="width: 80%" class="img-circle img-bordered-sm" src="common/assets/img/avatar.png">
                            </div>
                            <span class="username">
                                <a href="#">Jessica</a>
                            </span>
                            <p style="font-size: 11px" class="description">2016-10-19 16:00</p>
                        </div>
                        <!-- /.user-block -->
                        <p style="color: #000000" class="h4">测试标题</p>
                        <p>
                            测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试
                        </p>
                        <ul class="list-inline">
                            <li style="margin-left: 1%">
                                <a href="#" class="link-black text-sm">
                                    <i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;赞
                                </a>
                            </li>
                            <li class="pull-right" style="margin-right: 1%">
                                <span style="font-family:Microsoft YaHei;font-weight:400;font-size:17px;opacity:1">2</span>
                                <span style="font-family:Microsoft YaHei;font-weight:500;font-size:14px;opacity:0.8">个赞</span>
                            </li>
                        </ul>
                        <form class="row">
                            <div class="col-md-10 col-sm-10">
                                <input class="form-control input-sm" type="text" placeholder="说点什么吧">
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <button type="submit" class="btn btn-primary pull-right btn-block btn-sm">提交</button>
                            </div>
                        </form>
                        <hr>
                        <p class="h4">
                            评论区
                        </p>
                        <!--评论区-->
                        <div class="post clearfix" style="margin: 2%">
                            <div class="user-block">
                                <div class="col-md-1">
                                    <img style="width: 80%" class="img-circle img-bordered-sm" src="common/assets/img/avatar2.png">
                                </div>
                                <a href="#">Phoebe</a>
                                <p style="font-size: 11px" class="description">2016-10-19 16:00</p>
                            </div>
                            <p>很好这里是评论区</p>

                            <form class="form-horizontal">
                                <div class="form-group margin-bottom-none">
                                    <div class="col-sm-10">
                                        <input class="form-control input-sm" placeholder="回复">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary pull-right btn-block btn-sm">发送</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="post clearfix" style="margin: 2%">
                            <div class="user-block">
                                <div class="col-md-1">
                                    <img style="width: 80%" class="img-circle img-bordered-sm" src="common/assets/img/avatar2.png">
                                </div>
                                <a href="#">Phoebe</a>
                                <p style="font-size: 11px" class="description">2016-10-19 16:00</p>
                            </div>
                            <p>很好这里是评论区</p>

                            <form class="form-horizontal">
                                <div class="form-group margin-bottom-none">
                                    <div class="col-sm-10">
                                        <input class="form-control input-sm" placeholder="回复">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary pull-right btn-block btn-sm">发送</button>
                                    </div>
                                </div>
                            </form>
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
