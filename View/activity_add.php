<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>发布新活动</title>

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
            <h1>发布新挑战</h1>
        </section>
        <section class="content">
            <form class="form-horizontal">
                <!--活动名称、时间、类型、介绍、目标-->
                <div class="form-group">
                    <label class="col-sm-offset-2 col-sm-2 control-label">挑战名称</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="activityname">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-offset-2 col-sm-2 control-label">挑战时间</label>
                    <div class="col-sm-5">
                        <input type="date" id="startdate">
                        <label>&nbsp;至&nbsp;</label>
                        <input type="date" id="enddate">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-offset-2 col-sm-2 control-label">目标</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control" id="goal">
                    </div>
                    <div class="col-sm-1">
                        <label>公里</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-offset-2 col-sm-2 control-label">挑战类别</label>
                    <div class="col-sm-4">
                        <select>
                            <option value="run">合作赛</option>
                            <option value="swim">个人挑战</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-offset-2 col-sm-2 control-label">挑战简介</label>
                    <div class="col-sm-4">
                        <textarea class="textarea" placeholder="描述一下你的挑战吧" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-1">
                        <button type="submit" class="btn btn-info">发布</button>
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" class="btn btn-danger">取消</button>
                    </div>
                </div>
            </form>
        </section>
    </div>

    <?php include("common/footer.html");?>
</div>
</body>
</html>
