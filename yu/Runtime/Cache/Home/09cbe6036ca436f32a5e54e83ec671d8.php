<?php if (!defined('THINK_PATH')) exit();?><!--Header-->
<!DOCTYPE html>
<html lang="ch">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">
    <title>YOUR URLS</title>
    <!-- Bootstrap core /yu/yu/Public/css -->
    <link href="/yu/yu/Public/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/yu/yu/Public/css/dashboard.css" rel="stylesheet">
    <link href="/yu/yu/Public/plugins/font-awesome/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <!-- navbar-default -->
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo U('Home/Index/index');?>">YOUR URLS</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="#"></a>
                    </li>
                    <li>
                        <a href="<?php echo U('Home/Index/index');?>">主页</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" aria-expanded="true">
                            公开推荐 <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo U('Home/Index/open_urls');?>">URLS</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo U('Home/Index/open_notes');?>">轻笔记</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#"></a>
                    </li>
                    <li>
                        <a href="#"></a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)"><span class="glyphicon glyphicon-user" aria-hidden="true"> <?php echo $_SESSION['user_name']; ?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo U('Urls/show');?>"><span class="glyphicon glyphicon-globe" aria-hidden="true"> 我的URL</a></li>
                            <li><a href="<?php echo U('Notes/show');?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"> 我的轻笔记</a></li>
                            <li><a href="<?php echo U('Index/tags');?>"><span class="glyphicon glyphicon-tag" aria-hidden="true"> 我的标签</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo U('Urls/index');?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"> 添加URL</a></li>
                            <li><a href="<?php echo U('Notes/index');?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"> 添加轻笔记</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo U('Home/Logout/index','','');?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"> 退出</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"></a>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" method="post" action="<?php echo U('Home/Index/search_all');?>">
                    <input name="key" id="search-all" class="form-control" type="text" placeholder="搜索...">
                </form>
            </div>
        </div>
    </nav>
<div class="container-fluid">
    <div class="row">
        <!--Sidebar-->
        <div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li>
            <a href="<?php echo U('Index/index');?>">
            	<span class="glyphicon glyphicon-home" aria-hidden="true"> 主页
        	</a>
        </li>
        <li>
            <a href="javascript:void(0);">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"> 管理
            </a>
        </li>
    </ul>
    <ul class="nav nav-sidebar">
    	<li>
            <a id="show-note" href="<?php echo U('Urls/index');?>">
                <span class="glyphicon glyphicon-send" aria-hidden="true"> 添加URLS
             </a>
        </li>
        <li>
            <a id="show-note" href="<?php echo U('Notes/index');?>">
                <span class="glyphicon glyphicon-fire" aria-hidden="true"> 添加轻笔记
             </a>
        </li>
    </ul>
</div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="sub-header">列表：</h2>
             <form id="add-url" class="form-signin" action="<?php echo U('Home/Notes/add');?>" method="post">
                <h2 class="form-signin-heading">YOUR NOTES</h2>
                <textarea class="form-control" placeholder="YOUR NOTES" name="noteValue" rows="3"></textarea>
                <br/>
                <br/>
                <input type="text" id="url-tag" class="form-control input-lg" placeholder="YOUR TAGS" name="tagValue" required="" autofocus="">
                <br/>
                <label class="radio-inline">
                    <input type="radio" name="isopen" id="isopen1" value="1" checked> 公开
                </label>
                <label class="radio-inline">
                    <input type="radio" name="isopen" id="isopen2" value="0">不公开
                </label>
                <br/>
                <br/>
                <button id="btn-insert-urls" class="btn btn-default btn-lg" type="submit">提交</button>
            </form>
        </div>
    </div>
</div>
<!--Login-->

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/yu/yu/Public/js/jquery.js"></script>
<script src="/yu/yu/Public/plugins/bootstrap/js/bootstrap.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script>
    $(document).ready(function() {
        function isURL(URL) {
            var strRegex = "^((https|http|ftp|rtsp|mms)://)?[a-z0-9A-Z]{100}\.[a-z0-9A-Z][a-z0-9A-Z]{0,61}?[a-z0-9A-Z]\.com|net|cn|cc (:s[0-9]{1-4})?/$";
            var re = new RegExp(strRegex);
            if (re.test(URL)) {
                return true;
            } else {
                return false;
            }
        }
    });
    </script>
</body>

</html>