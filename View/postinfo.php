<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>动态具体信息</title>

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
            getPostInfo();
            getComments();
        });

        function getPostInfo() {
            var post = <?PHP echo $_SESSION['postid'] ?>;
            $.getJSON("/Post/"+post,function(data){
                var path = "";
                if(data.avatar != null) {
                    path = '../'+data.avatar;
                }
                $('#detailavatar').attr('src',path);
                $('#detailname').attr('href','/sportinfo/'+data.userid);
                var title = document.getElementById('detailtitle');
                title.innerHTML = data.title;
                var content = document.getElementById('detailcontent');
                content.innerHTML = data.content;
                var time = document.getElementById('detailtime');
                time.innerHTML = data.createtime;
                var name = document.getElementById('detailname');
                name.innerHTML = data.username;
                var like = document.getElementById('likenum');
                like.innerHTML = data.like;
            });
        }

        function getComments() {
            var post = <?PHP echo $_SESSION['postid'] ?>;
            $.getJSON("/Comment/"+post,function(data){
                var ul = document.getElementById('comments');
                $.each(data,function (entryindex,entry) {
                    var name = entry['username'];
                    var id = entry['userid'];
                    var createtime = entry['createtime'];
                    var content = entry['content'];
                    var path = "";
                    if(entry['avatar'] != null)
                        path = "../"+entry['avatar'];

                    var single = '<li class="col-md-12"><div class="post clearfix" style="margin: 2%"><div class="user-block">';
                    single += '<div class="col-md-1"><img style="width: 80%" class="img-circle img-bordered-sm" src="'+path+'"></div>';
                    single += '<a href="/sportinfo/'+id+'">'+name+'</a><p style="font-size: 11px" class="description">'+createtime+'</p>';
                    single += '</div><p>'+content+'</p></div></li>';

                    ul.innerHTML += single;
                })
            });
        }

        function like() {
            var myForm = document.createElement("form");
            myForm.method = "post";
            myForm.action = '/like';
            document.body.appendChild(myForm);
            myForm.submit();
            document.body.removeChild(myForm);
        }

    </script>

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
                                <img style="width: 80%" class="img-circle img-bordered-sm" id="detailavatar">
                            </div>
                            <span class="username">
                                <a  id="detailname"></a>
                            </span>
                            <p style="font-size: 11px" class="description" id="detailtime"></p>
                        </div>
                        <!-- /.user-block -->
                        <p id="detailtitle" style="color: #000000" class="h4"></p>
                        <p id="detailcontent"></p>
                        <ul class="list-inline">
                            <li style="margin-left: 1%">
                                <a onclick="like()" href="javascript:;" class="link-black text-sm">
                                    <span id="liketest" class="glyphicon glyphicon-thumbs-up">赞</span>
                                </a>
                            </li>
                            <li class="pull-right" style="margin-right: 1%">
                                <span id="likenum" style="font-family:Microsoft YaHei;font-weight:400;font-size:17px;opacity:1"></span>
                                <span style="font-family:Microsoft YaHei;font-weight:500;font-size:14px;opacity:0.8">个赞</span>
                            </li>
                        </ul>
                        <form method="post" action="/addComment" class="row">
                            <div class="col-md-10 col-sm-10">
                                <input name="commentcontent" class="form-control input-sm" type="text" placeholder="说点什么吧">
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <button type="submit" class="btn btn-primary pull-right btn-block btn-sm">提交</button>
                            </div>
                        </form>
                        <hr>
                        <p class="h4">评论区</p>
                        <ul id="comments"></ul>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include("common/footer.html");?>
</div>
</body>
</html>
