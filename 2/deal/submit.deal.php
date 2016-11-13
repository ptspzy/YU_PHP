<?php
require_once 'connect.php';
require_once 'rurl.class.php';

if (isset($_POST['userValue'])&&!empty($_POST['userValue'])) {
  echo "您输入的是".$_POST['userValue'];
} 
else {
  echo "没有接收到post值";
}

<meta charset="utf-8">



// require_once 'connect.php';
// 	require_once 'rurl.class.php';
// 	$arr=array();
// 	$res=Rurl::validate($arr);
// 	if($res){

// 		$sql="INSERT recordtry(user_name,url,pub_time) VALUES(?,?,?);";
// 		$mysqli_stmt=$mysqli->prepare($sql);
// 		$arr['pubTime']=time();
// 		$mysqli_stmt->bind_param('ssi',$arr['username'],$arr['url'],$arr['pubTime']);
// 		$mysqli_stmt->execute();

// 		$rurl=new Rurl($arr);
// 		//echo json_encode(array('status'=>1,'html'=>$rurl->output()));
// 		echo "111";
// 	}
// 	else{
// 		echo '{"status":0,"errors":'.json_encode($arr).'}';
// 	}
