<!DOCTYPE html>
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
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>

<body>
    <div class="container">
    <h1 align="center">YOUR URLS:<a href="../"><h5>SHOW...</h5></a></h1>
    <hr>
        <div class="col-md-6">
            <form class="form-signin"  action="url.add.php" method="post">
                <br/>
                <input type="text" id="text-title" class="form-control" name="titleValue" placeholder="URL's TITLE" >
                <br/>
                <input type="url" id="url-url" class="form-control" name="urlValue" placeholder="URL" >
                <br/>
                <textarea id="textarea-note" class="form-control" name="noteValue" placeholder="NOTE"></textarea>
                <br/>
                <select id="select-term" name="termValue" class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <br/>
                <input type="password" id="mykey" class="form-control" name="key" placeholder="KEY" >
                <br/>
                <img id="captcha_img" src="yzm.php?r="+<?php echo rand();?> onclick="document.getElementById('captcha_img').src='yzm.php?r='+Math.random()">
                <br/>
                <input type="text" id="text-identify-code" class="form-control" name="identify-code" placeholder="CODE" >
                <br/>
                <input type="button" class="btn btn-lg btn-primary btn-block" id="btn-insert-urls" value="SUBMIT">
            </form>    
        </div> 
        <div class="col-md-6">
            <form class="form-signin">
                <br/>
                <input type="text" id="text-make-term" class="form-control" placeholder="创建类别" >
                <br/>
                <input type="button" id="btn-make-term" class="btn btn-lg btn-primary btn-block" value="创建">
            </form>    
        </div>                             
    </div>
    <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
    <script>
        $(document).ready(function() {
            $("#btn-insert-urls").click(function() {
                var user="2";
                var title = $("#text-title").val();
                var url = $("#url-url").val();
                var note = $("#textarea-note").val();
                var term = $("#select-term option:selected").prop('value');
                var icode = $("#text-identify-code").val();
                var key = $("#mykey").val();
                if(title!=""&&url!=""&&term!="")
                {
                    $.ajax({
                        type: "POST",
                        url: "../ajax/ajax.deal.php",
                        datatype: "json",
                        data: {
                            "method": "insertUrls", //后台方法
                            "user":user,
                            "title":title,
                            "url":url,
                            "note":note,
                            "term":term,
                            "key":key,
                            "icode":icode
                        },
                        success: function(data) {
                             if(data=='1')
                            alert('成功啦');
                            alert(data);
                            location.reload();  
                           
                        },
                        error: function() {
                            alert("ajax错误");
                            return false;
                        }
                    });
                            
                }
            });
            $("#btn-make-term").click(function() {
              
                var term = $("#text-make-term").val();
                var key = $("#mykey").val();
                if(term.length>=2)
                {
                    $.ajax({
                        type: "POST",
                        url: "../ajax/ajax.deal.php",
                        datatype: "json",
                        data: {
                            "method": "insertTerms", //后台方法
                            "term":term,
                            "key":key
                        },
                        success: function(data) {
                            if(data=='1')
                            alert('成功啦');
                            location.reload();
                           
                        },
                        error: function() {
                            alert("ajax错误");
                            return false;
                        }
                    });
                            
                }
            });
        });
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "../ajax/ajax.deal.php",
                datatype: "json",
                data: {
                    "method": "getTermsAll", //后台方法
                },
                success: function(data) {
                    var json = eval('(' + data + ')');
                    var htmlStr = "";
                    for (var i = 0; i < json.length; i++) {
                        htmlStr += "<option value=\""+json[i].term_id+"\">" + json[i].name +"</option>";
                    }
                    $("#select-term").html("<option>请选择类别：</option>" + htmlStr);
                },
                error: function() {
                    alert("ajax错误");
                    return false;
                }
            });
        });
    </script>
</body>

</html>
