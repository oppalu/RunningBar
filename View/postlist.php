<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>好友动态</title>

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
            <h4>好友动态</h4>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-11 col-sm-11">
                    <div class="box box-default">
                        <div class="box-body">
                            <div class="post clearfix" style="margin: 2%">
                                <div class="user-block">
                                    <div class="col-md-1">
                                        <img style="width: 80%" class="img-circle img-bordered-sm" src="../public/img/avatar2.png">
                                    </div>
                                    <a href="#">Phoebe</a>
                                    <p style="font-size: 11px" class="description">2016-10-19 16:00</p>
                                </div>
                                <a href="postinfo.php" style="font-family:Microsoft YaHei;color: #000000;font-size:20px;">这里是标题</a>
                                <p class="product-description">这里是内容</p>

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
                                    <li class="pull-right" style="margin-right: 1%">
                                        <span style="font-family:Microsoft YaHei;font-weight:400;font-size:17px;opacity:1">5</span>
                                        <span style="font-family:Microsoft YaHei;font-weight:500;font-size:14px;opacity:0.8">条评论</span>
                                    </li>
                                </ul>

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
                                        <img style="width: 80%" class="img-circle img-bordered-sm" src="../public/img/avatar2.png">
                                    </div>
                                    <a href="#">Phoebe</a>
                                    <p style="font-size: 11px" class="description">2016-10-19 16:00</p>
                                </div>
                                <a href="postinfo.php" style="font-family:Microsoft YaHei;color: #000000;font-size:20px;">这里是标题</a>
                                <p class="product-description">这里是内容</p>

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
                                    <li class="pull-right" style="margin-right: 1%">
                                        <span style="font-family:Microsoft YaHei;font-weight:400;font-size:17px;opacity:1">5</span>
                                        <span style="font-family:Microsoft YaHei;font-weight:500;font-size:14px;opacity:0.8">条评论</span>
                                    </li>
                                </ul>

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
            </div>
        </section>
    </div>

    <?php include("common/footer.html");?>
</div>
</body>
</html>
