<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员</title>

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
            getReview();
        });

        function getReview() {
            $.getJSON('/adminget',function(data){
                var ul = document.getElementById('adminact');
                $.each(data,function (entryindex,entry) {

                    var type = entry['type'];
                    var id = entry['id'];
                    var name = entry['name'];
                    var starttime = entry['starttime'];
                    var endtime = entry['endtime'];
                    var author = entry['createuser'];
                    var path = "../public/img/team.jpg";
                    if(type == 'single')
                        path = "../public/img/single.png";
                    var introduction = entry['introduction'];

                    var single = '<li class="col-md-12"><form method="post" action="/review/'+id+'"><div class="col-sm-1"><img style="width: 100%;" class="img-circle" src="';
                    single += path+'"></div><div class="col-sm-3"><a href="#"><h4>'+name+'</h4></a></label></div>';
                    single += '<div class="col-sm-3"><label>'+starttime+' - '+endtime+'</label></div>';
                    single += '<div class="col-sm-4"><label>'+introduction+'</label><input type="hidden" name="au" value="'+author+'"/></div>';
                    single += '<div class="col-sm-1"><button type="submit" class="btn btn-info">审批</button></div>';
                    single += '<hr class="col-sm-12" size="10"></form></li>';

                    ul.innerHTML += single;
                })
            });
        }
    </script>

</head>
<body class="skin-blue">
<div >
    <section class="content-header">
        <h1>活动审批</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">最新活动</h3>
                    </div>
                    <div class="box-body">
                        <ul id="adminact"></ul>
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
