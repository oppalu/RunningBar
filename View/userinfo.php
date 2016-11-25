<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户个人信息</title>

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
            getUserInfo();
        });
        function getUserInfo() {
            $.getJSON('/user/show',function(data){
                $('#user_name').val(data.username);
                var path = '../'+data.avatar;
                $('#userimage').attr('src',path);
                $('#sex').val(data.sex);
                $('#weight').val(data.weight);
                $('#birth').val(data.birth);
                $('#location').val(data.location);
                $('#interest').val(data.interest);
                $('#slogen').val(data.slogen);
            });
        }
        function setImagePreview() {
            var docObj = document.getElementById("file");
            var preview = document.getElementById("userimage");
            preview.src = window.URL.createObjectURL(docObj.files[0]);
        }
    </script>

</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <?php include("common/header.html");?>

    <!--中心界面部分-->
    <div class="content-wrapper">
        <section class="content-header"><h1>个人信息</h1></section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#info" data-toggle="tab">基本信息</a></li>
                            <li><a href="#account" data-toggle="tab">账号安全</a></li>
                        </ul>

                        <div class="tab-content">
                            <!--个人信息tab界面-->
                            <div class="tab-pane active" id="info">
                                <form method="post" action="/user/info" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-offset-2 col-sm-2 control-label">头像</label>
                                        <div class="col-sm-2 pull-left image">
                                            <img class="img-circle" id="userimage" name="userimage" width="80%" height="80%" style="diplay:none" />
                                        </div>
                                        <br>
                                        <div class="col-sm-4">
                                            <input type="file" id="file" name="file" id="file" onchange="setImagePreview()">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-offset-2 col-sm-2 control-label">用户名</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="用户名">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-offset-2 col-sm-2 control-label">性别</label>
                                        <div class="col-sm-8">
                                            <select id="sex" name="sex">
                                                <option value="男">男</option>
                                                <option value="女">女</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-offset-2 col-sm-2 control-label">体重</label>
                                        <div class="col-sm-2">
                                            <input id="weight" name="weight" type="text" class="form-control" placeholder="当前体重">
                                        </div>
                                        <label class="control-label">kg</label>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-offset-2 col-sm-2 control-label">生日</label>
                                        <div class="col-sm-3">
                                            <input id="birth" name="birth" type="date">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-offset-2 col-sm-2 control-label">所在地</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="location" name="location" placeholder="所在地">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-offset-2 col-sm-2 control-label">兴趣</label>
                                        <div class="col-sm-3">
                                            <select id="interest" name="interest">
                                                <option value="跑步">跑步</option>
                                                <option value="游泳">游泳</option>
                                                <option value="健身">健身</option>
                                                <option value="瑜伽">瑜伽</option>
                                                <option value="骑行">骑行</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-offset-2 col-sm-2 control-label">运动宣言</label>
                                        <div class="col-sm-3">
                                            <textarea class="textarea" id="slogen" name="slogen" placeholder="添加宣言让大家认识你" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-8">
                                            <button type="submit" class="btn btn-danger">修改</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--账号信息(密码)界面-->
                            <div class="tab-pane" id="account">
                                <div style="width: 50%" class="col-md-offset-2">
                                    <h4 class="col-sm-offset-2">修改密码</h4>
                                    <form method="post" action="/user/account" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-offset-2 col-sm-4 control-label">当前密码</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="current_pwd">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-offset-2 col-sm-4 control-label">新密码</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="new_pwd">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-offset-2 col-sm-4 control-label">重复新密码</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="repeat_pwd">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-6 col-sm-4">
                                                <button type="submit" class="btn btn-danger">修改密码</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
</body>
</html>
