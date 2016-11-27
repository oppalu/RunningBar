<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人动态</title>

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
            getBrief();
            getMyPosts();
        });

        function getBrief() {
            $.getJSON('/user/show',function(data){
                var temp = document.getElementById('tempname');
                temp.innerHTML = data.username;
                var path = '../'+data.avatar;
                $('#tempavatar').attr('src',path);
            });
        }

        function getMyPosts() {
            $.getJSON('/myPosts',function(data){
                var ul = document.getElementById('myposts');
                var count = eval(data).length;
                var temp = document.getElementById('postcount');
                temp.innerHTML = count+'条动态';
                $.each(data,function (entryindex,entry) {
                    var id = entry['id'];
                    var title = entry['title'];
                    var content = entry['content'];
                    var single = '<li class="item"><form method="post" action="/deletePost"><div class="col-md-offset-1 col-md-8 col-sm-8">';
                    single += '<input type="hidden" name="postid" value="'+id+'"/><a class="h4" href="/Dynamic/'+id+'">'+title+'</a><p class="product-description">';
                    single += content+'</p></div><div><button type="submit" class="btn btn-danger">删除</div></form><hr class="col-sm-12" size="10"></li>';

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
            <h1>个人动态</h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="col-sm-6">
                                <img id="tempavatar" width="70%" height="70%" class="img-responsive img-circle">
                            </div>
                            <div class="col-sm-6">
                                <h3 id="tempname"></h3>
                                <p id="postcount" class="text-muted"></p>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header">
                            发布新动态
                        </div>
                        <div class="box-body">
                            <form method="post" action="/addPost" class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="posttitle" placeholder="标题">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <textarea name="postcontent" class="textarea" placeholder="随便说点什么吧" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-offset-3">
                                        <button type="submit" class="btn btn-app">发布</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">所有动态</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul id="myposts" class="products-list product-list-in-box"></ul>
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
