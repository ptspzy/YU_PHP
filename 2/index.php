<?php 
// error_reporting(E_ALL ^ E_NOTICE);//解决 Notice: Undefined variable: comments 
require_once 'deal/connect.php';
$sql="SELECT ID,url,title,time,note,name,count FROM cp_terms,cp_urls WHERE cp_terms.term_id=cp_urls.term_id ORDER BY ID DESC  LIMIT 20 ";
$mysqli_result=$mysqli->query($sql);
if($mysqli_result&& $mysqli_result->num_rows>0){
    while($row=$mysqli_result->fetch_assoc()){
        $urls[]=$row;
    }
}
?>
    <!DOCTYPE html>
    <!-- saved from url=(0041)http://v3.bootcss.com/examples/dashboard/ -->
    <html lang="zh-CN">

    <head>
        <meta property="qc:admins" content="156671402460430216375" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="http://v3.bootcss.com/favicon.ico">
        <title>URLS</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/dashboard.css" rel="stylesheet">
        <script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="101266706" data-redirecturi="http://url.ptspzy.com/qc_callback.php" charset="utf-8" ></script>
					  <script type="text/javascript">
                     QC.Login({
                      btnId : "qqLoginBtn",//插入按钮的html标签id
                      size : "C_S",//按钮尺寸
                      scope : "get_user_info",//展示授权，全部可用授权可填 all
                      display : "pc"//应用场景，可选
                     });
                    var cbLoginFun = function(oInfo, oOpts){
                        //alert(oInfo.nickname); // 昵称
                        //alert(oOpts.btnId);    // 点击登录的按钮Id
                    };
                    QC.Login({btnId:"qqLoginBtn"}, cbLoginFun);
                    QC.Login.getMe(function(openId, accessToken){})
                    </script>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">YOUR URLS     <span class="glyphicon glyphicon-education" style="color:white"></span></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="add/">ADD</a></li>
                        <li><a href="javascript:void(0);">Settings</a></li>
                        <li style="margin: 13px;color : white;"><span id="qqLoginBtn"></span></li>
                        <script type="text/javascript">
                            QC.Login({
                               btnId:"qqLoginBtn"    //插入按钮的节点id
                        });
                    </script>
                    </ul>
                    
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar" id="div-terms">
                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="javascript:void(0);" id="refresh-page">LASTED 20</a></li>
                    </ul>
                    <h4>热门分类：</h4>
                    <ul class="nav nav-sidebar" id="ul-nav-terms">
                        <br><br><br><br>
                       <p><i class="icon-spinner icon-spin icon-4x" style="margin-left:50px"></i></p>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <div class="row">
                        <h1 class="page-header">PTSPZY.COM<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1126563580&site=qq&menu=yes"><small> <sapn class="glyphicon glyphicon-leaf" style="color:green"></span> QQ联系我  <sapn class="glyphicon glyphicon-leaf" style="color:green"></span></small></a>  <a href="javascript:void(0);"><img border="0" src="http://cc.amazingcounters.com/counter.php?i=3196812&c=9590749" alt="AmazingCounters.com"></a>    </h1>           
                        
                    </div>
                    <div class="row has-success has-feedback">
                        <div class="input-group">
                            <input type="text" class="form-control input-lg" id="search-text">
                            <span class="input-group-addon input-lg" id="search-span">GO</span>
                        </div>
                    </div>
                    <div id="qwer"></div>
                    <h2 class="sub-header">LASTED 20</h2>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>URLS</th>
                                    <th>TIME</th>
                                    <th>NOTE</th>
                                    <th>TERM</th>
                                    <th>COUNT</th>
                                </tr>
                            </thead>
                            <tbody id="tb-urls-show">
                                <!-- php code
     ================================================== -->
                                <?php 
        if(is_array($urls)&&!is_null($urls)) {
            foreach($urls as $val){
                $td_url_str="<td><a href='".$val['url']."' onclick=\"updateCount('".$val['ID']."')\" target='_blank'>".$val['title']."</a></td>"; 
                $td_time_str="<td>".$val['time']."</td>";
                $td_note_str="<td>".$val['note']."</td>";
                $td_term_str="<td>".$val['name']."</td>";
                $td_count_str="<td>".$val['count']."</td>";
                $tr_str="<tr>".$td_url_str.$td_time_str.$td_note_str.$td_term_str.$td_count_str."</tr>";
                echo $tr_str;
            }
        }
        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="js/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="js/ie10-viewport-bug-workaround.js"></script>
        <script>
        var searchKey = "";
        //全局搜索
        function searchGlobal() {
            $("#tb-urls-show").html("<p><i class=\"icon-spinner icon-spin icon-4x\" style=\"margin-left:600px;margin-top:150px\"></i></p>");
            $(function() {
                $.ajax({
                    type: "POST",
                    url: "ajax/ajax.deal.php",
                    datatype: "json",
                    data: {
                        "method": "searchGlobal", //后台方法
                        "searchKey": searchKey //搜索值
                    },
                    success: function(data) {
                        //$("#qwer").html(data);
                        var json = eval('(' + data + ')');
                        var htmlStr = "";
                        for (var i = 0; i < json.length; i++) {
                            var td_url_str = "<td><a href='" + json[i].url + "' onclick=\"updateCount('" + json[i].ID + "')\" target='_blank'>" + json[i].title + "</a></td>";
                            var td_time_str = "<td>" + json[i].time + "</td>";
                            var td_note_str = "<td>" + json[i].note + "</td>";
                            var td_term_str = "<td>" + json[i].name + "</td>";
                            var td_count_str = "<td>" + json[i].count + "</td>";
                            htmlStr += "<tr>" + td_url_str + td_time_str + td_note_str + td_term_str + td_count_str + "</tr>";
                        }
                        $("#tb-urls-show").html(htmlStr);
                    },
                    error: function() {
                        alert("ajax错误");
                        return false;
                    }
                });
            });
        }
        //判断搜索框是否为空
        function searchKeyIsNull() {
            searchKey = $("#search-text").val();
            return (searchKey == '') ? true : false;
        }
        $(document).ready(function() {
            //全局搜索点击事件
            $("#search-span").click(function() {
                if (!searchKeyIsNull()) searchGlobal();
                else return;
            });
            //全局搜索回车事件
            $("#search-text").keydown(function(e) {
                if (e.keyCode == 13) {
                    if (!searchKeyIsNull()) searchGlobal();
                    else return;
                }
            });
        });
        //刷新页面（最近20条）
        $(document).ready(function() {
            $("#refresh-page").click(function() {
                location.reload();
            })
        });
        //获取所有分类显示在左侧
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "ajax/ajax.deal.php",
                datatype: "json",
                data: {
                    "method": "getTermsAll", //后台方法
                },
                success: function(data) {
                    var json = eval('(' + data + ')');
                    var htmlStr = "";
                    for (var i = 0; i < json.length; i++) {
                        htmlStr += "<li><a href=\"javascript:void(0);\" class=\"a-term-"+json[i].term_id+"\" onclick=\"geturlByterm('" + json[i].term_id + "')\">" + json[i].name + " <span class=\"badge\" style=\"background-color:#009688\">"+json[i].url_count+"</span></a></li>";
                    }
                    $("#ul-nav-terms").html(htmlStr);
                },
                error: function() {
                    alert("ajax错误");
                    return false;
                }
            });
        });
        //根据类别查询该类别所有数据
        function geturlByterm(ID) {
            $("#tb-urls-show").html("<p><i class=\"icon-spinner icon-spin icon-4x\" style=\"margin-left:600px;margin-top:150px\"></i></p>");
            $(".sub-header").html($(".a-term-"+ID+"").html());
            $(function() {
                $.ajax({
                    type: "POST",
                    url: "ajax/ajax.deal.php",
                    datatype: "json",
                    data: {
                        "method": "geturlByterm", //后台方法
                        "termID": ID //搜索值
                    },
                    success: function(data) {
                        var json = eval('(' + data + ')');
                        var htmlStr = "";
                        for (var i = 0; i < json.length; i++) {
                            var td_url_str = "<td><a href='" + json[i].url + "' onclick=\"updateCount('" + json[i].ID + "')\" target='_blank'>" + json[i].title + "</a></td>";
                            var td_time_str = "<td>" + json[i].time + "</td>";
                            var td_note_str = "<td>" + json[i].note + "</td>";
                            var td_term_str = "<td>" + json[i].name + "</td>";
                            var td_count_str = "<td>" + json[i].count + "</td>";
                            htmlStr += "<tr>" + td_url_str + td_time_str + td_note_str + td_term_str + td_count_str + "</tr>";
                        }

                        $("#tb-urls-show").html(htmlStr);
                    },
                    error: function() {
                        alert("ajax错误");
                        return false;
                    }
                });
            });
        }
        //统计count，每点击一次自动加1
        function updateCount(ID) {
            $(function() {
                $.ajax({
                    type: "POST",
                    url: "ajax/ajax.deal.php",
                    datatype: "json",
                    data: {
                        "method": "updateCount", //后台方法
                        "urlID": ID //搜索值
                    },
                    success: function(data) {
                        //alert(data);
                    },
                    error: function() {
                        alert("ajax错误");
                        return false;
                    }
                });
            });
        };
        function leftTermsStyleControl () {
            // body...
        }
        </script>
    </body>

    </html>
