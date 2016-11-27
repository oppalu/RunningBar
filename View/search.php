<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户搜索结果</title>

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
            searchUser();
        });
        function searchUser() {
            $.getJSON('/search',function(data){
                var ul = document.getElementById('search');
                $.each(data,function (entryindex,entry) {
                    var name = entry['username'];
                    var sex = entry['sex'];
                    var location = entry['location'];
                    var slogen = "还没有填写个人简介";
                    if(entry['slogen'] != null)
                        slogen = entry['slogen'];
                    var path = "";
                    if(entry['avatar'] != null)
                        path = "../"+entry['avatar'];

                    var single = '<li class="col-md-12"><div class="col-sm-1"><img style="width: 100% " class="img-circle" src="'+path+'"></div>';
                    single += '<div class="col-sm-2"><a href="#"><b>'+name+'</b></a><br><label>'+sex+'</label><br><label>'+location+'</label></div>';
                    single += '<div class="col-sm-7"><label>'+slogen+'</label></div><div class="col-sm-2"><button class="btn btn-info">';
                    if(entry['isFriend'] == 1) {
                        single += '<i class="glyphicon glyphicon-plus"></i>已&nbsp;关&nbsp;注</button></div><hr class="col-sm-12" size="10"></form>';
                    } else {
                        single += '<i class="glyphicon glyphicon-plus"></i>关&nbsp;注</button></div><hr class="col-sm-12" size="10"></form>';
                    }
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
        <section class="content-header"><h1>搜索结果</h1></section>

        <section class="content">
            <div class="box box-primary">
                <div class="box-body">
                    <ul id="search"></ul>
                </div>
            </div>
        </section>
    </div>

    <?php include("common/footer.html");?>
</div>
</body>
</html>
