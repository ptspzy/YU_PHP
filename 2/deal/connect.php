<?php
	require_once 'config.php';
	$mysqli=new mysqli(HOST,USERNAME,PASSWORD,DB,PORT);
	
	if($mysqli->errno){
		die('Connect Error:'.$mysqli->error);
	}
	else{
		$mysqli->set_charset('UTF8');
	}
?>