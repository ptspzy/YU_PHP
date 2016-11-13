<?php
	require_once('../deal/connect.php');
	$res=true;
	//把传递过来的信息入库
	if(!(isset($_POST['urlValue'])&&(!empty($_POST['urlValue'])))){
	echo "<script>alert('不能为空');window.location.href='index.php';</script>";
	return;
	}
	
	$url = $_POST['urlValue'];
	$note = $_POST['noteValue'];
	$title=$_POST["titleValue"];
	
	
	
	/***/
	if($res){
		$sql="INSERT cp_temp(url,title,time,note) VALUES(?,?,?,?);";
		$mysqli_stmt=$mysqli->prepare($sql);
		$time=date('Y-m-d H:i:s',time());
		$mysqli_stmt->bind_param('ssss',$url,$title,$time,$note);
		$mysqli_stmt->execute();
		echo "<script>window.location.href='../index.php';</script>";
	}
	else{
		echo 'wrong!';
	}

?>