<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="common/assets/css/bootstrap.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="common/assets/css/App.css" type="text/css" media="all">
</head>

<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../index.php"><b>Running </b>Bar</a>
        <br>
        <p class="login-sublogo">奔跑遇见更好的你</p>
    </div>

    <div class="login-box-body">
        <p class="login-msg">注册账号</p>
        <form action="sportdata.php" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="手机号">
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="用户名">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <input type="text" class="form-control" placeholder="手机验证码">
                </div>
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">获取手机验证码</button>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-xs-6">
                    已有账号?&nbsp;
                    <a href="login.php" class="text-center">[登录]</a>
                </div>
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">注册</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="common/assets/js/jquery.min.js"></script>
<script src="common/assets/js/bootstrap.min.js"></script>

</body>
</html>