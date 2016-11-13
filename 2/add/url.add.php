<?php
	require_once('../deal/connect.php');
	$res=true;
	//把传递过来的信息入库
	if(!(isset($_POST['urlValue'])&&(!empty($_POST['urlValue'])))){
	echo "<script>alert('不能为空');window.location.href='index.php';</script>";
	return;
	}
	
	$user="2";
	$url = $_POST['urlValue'];
	$note = $_POST['noteValue'];
	$title=$_POST["titleValue"];
	$term=$_POST["termValue"];
	echo "<script>"+$term+"</script>";
	
	
	/***/

	$sql="INSERT cp_url(user_id,term_id,url,title,time,note) VALUES(?,?,?,?,?,?);";
	$mysqli_stmt=$mysqli->prepare($sql);
	$time=date('y-m-d h:i:s',time());;
	$mysqli_stmt->bind_param('ddssss',$user,$term,$url,$title,$time,$note);
	$mysqli_stmt->execute();
	echo "<script>window.location.href='../index.php';</script>";

?>