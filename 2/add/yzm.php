<?php
	session_start();
	//$_SESSION['identify_code']

	$image=imagecreatetruecolor(100,30);//创建
	$bgcolor=imagecolorallocate($image,255,255,255);
	imagefill($image,0,0,$bgcolor);
	//生成随机数字
	/*for($i=0;$i<4;$i++){
		$fontsize=6;
		$fontcolor=imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));//int
		$fontcontent=rand(0,9);
		
		$x=($i*100/4)+rand(5,10);
		$y=rand(5,10);
		
		imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);//随机内容
	}*/
	$captch_code="";
	//随机数字+字母
	for($i=0;$i<4;$i++){
		$fontsize=8;
		$fontcolor=imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));//int
		$data='abcdefhijkmnprstuvwxy345678';
		$fontcontent=substr($data,rand(0,strlen($data)),1);//随机取一个字符
		$captch_code.=$fontcontent;
		$x=($i*100/4)+rand(5,10);
		$y=rand(5,10);
		
		imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);//随机内容
		
	}
	$_SESSION['identify_code']=$captch_code;
	
	
	
	//干扰素
	for($i=0;$i<1000;$i++){
		$pointcolor=imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
		imagesetpixel($image,rand(1,99),rand(1,99),$pointcolor);//随机点
	}
	for($i=0;$i<2;$i++){
		$linecolor=imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
		imageline($image,rand(1,99),rand(1,29),rand(1,99),rand(1,29),$pointcolor);//随机线
	}
	
	
	
	
	ob_clean();
	
	header('content-type:image/png');//输出格式
	imagepng($image);
	
	//end
	imagedestroy($image);
	
	
?>