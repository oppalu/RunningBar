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
    <script type="text/javascript">
        $(document).ready(function() {
            getUser();
            getAc();
        });
        function getUser() {
            $.getJSON('/user/show',function(data){
                document.getElementById('aname').innerHTML = data.username;
                document.getElementById('alevel').innerHTML += data.level;
                var path = "";
                if(data.avatar!= null)
                    path = '../'+data.avatar;
                $('#ava').attr('src',path);
            });
        }

        function getAc() {
            $.getJSON('/getActivities',function(data){
                var ul = document.getElementById('acs');
                $.each(data,function (entryindex,entry) {
                    var type = entry['type'];
                    var id = entry['id'];
                    var name = entry['name'];
                    var state = entry['state'];
                    var starttime = entry['starttime'];
                    var endtime = entry['endtime'];
                    var path = "../public/img/team.png";
                    if(type == 'single')
                        path = "../public/img/single.png";

                    var single = '<li class="col-md-12"><div class="col-sm-1"><img style="width: 100%;" class="img-circle" src="';
                    single += path+'"></div><div class="col-sm-3"><a href="/activityInfo/'+id+'"><h4>'+name+'</h4></a>';
                    single += '<label class="label-success">'+state+'</label></div><div class="col-sm-5 pull-right">';
                    single += '<label>'+starttime+' - '+endtime+'</label></div><hr class="col-sm-12" size="10"></li>';

                    ul.innerHTML += single;
                })
            });
        }
    </script>

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
                                <img width="70%" height="70%" class="img-responsive img-circle" id="ava">
                            </div>
                            <div class="col-sm-6">
                                <h3 id="aname"></h3>
                                <p id="alevel" class="text-muted">LV</p>
                            </div>
                            <div class="col-sm-8">
                                <a href="/addActivity" class="btn btn-primary btn-block"><b>发起活动</b></a>
                            </div>
                            <div class="col-sm-4">
                                <a data-toggle="modal" href="#" data-target="#read">规则介绍</a>
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
                            <ul id="acs"></ul>
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
