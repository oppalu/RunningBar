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

    <script type="text/javascript">
        $(document).ready(function () {
            getFriendPosts();
        });

        function getFriendPosts() {
            $.getJSON('/friendpost',function(data){
                var ul = document.getElementById('friendpost');
                $.each(data,function (entryindex,entry) {
                    var fid = entry['id'];
                    var id = entry['userid'];
                    var title = entry['title'];
                    var content = entry['content'];
                    var name = entry['username'];
                    var createtime = entry['createtime'];
                    var like = entry['like'];
                    var path = "";
                    if(entry['avatar'] != null)
                        path = "../"+entry['avatar'];
                    var single = '<div class="post clearfix" style="margin: 2%"><div class="user-block"><div class="col-md-1">';
                    single += '<img style="width: 80%" class="img-circle img-bordered-sm" src="'+path+'"></div><a href="/sportinfo/'+id+'">'+name+'</a>';
                    single += '<p style="font-size: 11px" class="description">'+createtime+'</p></div>';
                    single += '<a style="font-family:Microsoft YaHei;color: #000000;font-size:20px;" href="/Dynamic/'+fid+'">'+title+'</a>';
                    single += '<p class="product-description">'+content+'</p><ul class="list-inline"><li class="pull-right" style="margin-right: 1%">';
                    single += '<span style="font-family:Microsoft YaHei;font-weight:400;font-size:17px;opacity:1">'+like+'</span><span style="font-family:Microsoft YaHei;font-weight:500;font-size:14px;opacity:0.8">个赞</span></li></ul></div>';
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
            <h4>好友动态</h4>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-11 col-sm-11">
                    <div class="box box-default">
                        <div class="box-body">
                            <ul id="friendpost"></ul>
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
