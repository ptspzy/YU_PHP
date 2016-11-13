<?php
	require_once('../deal/config.php');
	require_once('cpdb.class.php');

	$flag_session= 0;
	session_start();
	if(isset($_POST["icode"])) {
	  if(strtolower($_POST["icode"])==$_SESSION['identify_code']){
	    $flag_session= 1;
	  }else{
	    $flag_session= 0;
	  }
	} 

	$cpdb_obj=new CPDB(HOST,USERNAME,PASSWORD,DB,PORT);

	$method = $_POST['method'];
	
	switch ($method) {
		case 'searchGlobal':
			$searchKey = $_POST['searchKey'];
			$cpdb_obj->searchGlobal($searchKey);
			break;
		case 'getTermsAll':
			$cpdb_obj->get_terms_all();
			break;
		case 'geturlByterm':
			$termID = $_POST['termID'];
			$cpdb_obj->get_urls_by_term($termID);
			break;
		case 'updateCount':
			$urlID=$_POST['urlID'];
			$cpdb_obj->update_count($urlID);
			break;
		case 'insertUrls':
			if($_POST['key']=="ptspzy"&&$flag_session==1)
			{
				$cpdb_obj->insert_urls($_POST['user'],$_POST['term'],$_POST['title'],$_POST['url'],$_POST['note']);
			}
			else {
				echo "密码或验证码错误。。";
			}
			break;
		case 'insertTerms':
			
			if($_POST['key']=="ptspzy"&&$flag_session==1)
			{
				$cpdb_obj->insert_terms($_POST['term']);
			}
			else {
				echo "密码或验证码错误。。";
			}
			break;
		default:
			# code...
			break;
	}

?>