<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户个人信息</title>

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
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-offset-2 col-sm-2 control-label">头像</label>
                                        <div class="col-sm-2 pull-left image">
                                            <img src="common/assets/img/avatar.png" width="80%" height="80%" class="img-circle" alt="User Image">
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-default">上传新头像</button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-offset-2 col-sm-2 control-label">用户名</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="username" value="Jessica" placeholder="用户名">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-offset-2 col-sm-2 control-label">性别</label>
                                        <div class="col-sm-8">
                                            <select>
                                                <option value="male">男</option>
                                                <option value="female">女</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-offset-2 col-sm-2 control-label">生日</label>
                                        <div class="col-sm-3">
                                            <input type="date" value="1989-04-18">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-offset-2 col-sm-2 control-label">所在地</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" value="江苏徐州" id="location" placeholder="所在地">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-offset-2 col-sm-2 control-label">兴趣</label>
                                        <div class="col-sm-3">
                                            <select>
                                                <option value="run">跑步</option>
                                                <option value="swim">游泳</option>
                                                <option value="fit">健身</option>
                                                <option value="yoga">瑜伽</option>
                                                <option value="bike">骑行</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-offset-2 col-sm-2 control-label">运动宣言</label>
                                        <div class="col-sm-3">
                                            <textarea class="textarea" placeholder="添加宣言让大家认识你" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-offset-2 col-sm-4 control-label">当前密码</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="current_pwd">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-offset-2 col-sm-4 control-label">新密码</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="new_pwd">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-offset-2 col-sm-4 control-label">重复新密码</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="repeat_pwd">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-6 col-sm-4">
                                                <button type="submit" class="btn btn-danger">修改密码</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <hr size="1">

                                <div style="width: 50%" class="col-md-offset-2">
                                    <h4 class="col-sm-offset-2">修改绑定手机号</h4>
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-sm-offset-2 col-sm-4 control-label">当前手机号</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="current_num">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-offset-2 col-sm-4 control-label">新手机号</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="new_num">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-offset-2 col-sm-4 control-label">输入验证码</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="confirm">
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="submit" class="btn btn-primary btn-block btn-flat">获取验证码</button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-6 col-sm-4">
                                                <button type="submit" class="btn btn-danger">修改手机号</button>
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
