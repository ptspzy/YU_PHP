<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://v3.bootcss.com/favicon.ico">
    <title>Signin Template for Bootstrap</title>
    <!-- Bootstrap core /yu/yu/Public/css -->
    <link href="/yu/yu/Public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/yu/yu/Public/css/signin.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form class="form-signin" method="post" action="<?php echo U('home/user/login_handle');?>" style="max-width: 330px;">
            <h2 class="form-signin-heading">YU 登录页</h2>
            <input type="text" id="userName" name="userName" class="form-control" placeholder="Login Name" value="">
            <input type="password" id="userPass" name="userPass" class="form-control" placeholder="Password" required="">
            <div class="checkbox">
                <label>
                    <a href="<?php echo U('home/user/register');?>">没有账户？</a>
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
        </form>
         <!-- <img src="/yu/yu/Public/img/yu.png" alt="yoururls"> -->
    </div>  
</body>

</html>