<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>好友信息</title>

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
        <section class="content-header"><h1>好友信息</h1></section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#followings" data-toggle="tab">我的关注</a></li>
                            <li><a href="#followers" data-toggle="tab">我的粉丝</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="followings">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <ul>
                                            <li class="col-md-12">
                                                <div class="col-sm-1">
                                                    <img style="width: 100% " src="../public/img/avatar2.png" class="img-circle">
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="#"><b>Phoebe</b></a><br>
                                                    <label>女</label><br>
                                                    <label>江苏 徐州</label>
                                                </div>
                                                <div class="col-sm-7">
                                                    <label>还没有填写个人简介</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-info">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        &nbsp;关&nbsp;注&nbsp;
                                                    </button>
                                                </div>
                                                <hr class="col-sm-12" size="10">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="followers">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <ul>
                                            <li class="col-md-12">
                                                <div class="col-sm-1">
                                                    <img style="width: 100% " src="../public/img/avatar2.png" class="img-circle">
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="#"><b>Phoebe</b></a><br>
                                                    <label>女</label><br>
                                                    <label>江苏 徐州</label>
                                                </div>
                                                <div class="col-sm-7">
                                                    <label>还没有填写个人简介</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-info">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        取&nbsp;消&nbsp;关&nbsp;注
                                                    </button>
                                                </div>
                                                <hr class="col-sm-12" size="10">
                                            </li>

                                            <li class="col-md-12">
                                                <div class="col-sm-1">
                                                    <img style="width: 100% " src="../public/img/avatar2.png" class="img-circle">
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="#"><b>Phoebe</b></a><br>
                                                    <label>女</label><br>
                                                    <label>江苏 徐州</label>
                                                </div>
                                                <div class="col-sm-7">
                                                    <label>还没有填写个人简介</label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-info">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        取&nbsp;消&nbsp;关&nbsp;注
                                                    </button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--tab-pane-->
                        </div>
                        <!--tab-content-->
                    </div>
                    <!--nav-tabs-custom-->
                </div>
                <!--col-->
            </div>
            <!--row-->
        </section>
    </div>

    <?php include("common/footer.html");?>
</div>
<script type="text/javascript">
    function getFollower() {
        $.getJSON('/getfollower',function(data){
            var ul = document.getElementById(obj);

            //添加 li
            var li = document.createElement("li");

            //设置 li 属性，如 id
            li.setAttribute("id", "newli");

            li.innerHTML = "js 动态添加li";
            ul.appendChild(li);
        });
    }
    function getFollowing() {
        $.getJSON('/getfollowing',function(data){
            $('#username').val(data.username);
            var path = '../'+data.avatar;
            $('#avatar').attr('src',path);
            $('#sex').val(data.sex);
            $('#weight').val(data.weight);
            $('#birth').val(data.birth);
            $('#location').val(data.location);
            $('#interest').val(data.interest);
            $('#slogen').val(data.slogen);
        });
    }
    window.onload = getFollower;
    window.onload = getFollowing;
</script>
</body>
</html>
