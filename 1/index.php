<?php 
error_reporting(E_ALL ^ E_NOTICE);//解决 Notice: Undefined variable: comments 
require_once 'deal/connect.php';
$sql="SELECT * FROM cp_temp order by time desc";
$mysqli_result=$mysqli->query($sql);
if($mysqli_result&& $mysqli_result->num_rows>0){
	while($row=$mysqli_result->fetch_assoc()){
		$urls[]=$row;
	}
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>ptspzy</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>

    <div class="container">
     	  <header class="grid-container">
            <h1 >YOUR URLS  <small><a href="addt/index.php" >ADD...</a></small></h1>
            <hr>
        </header>
        <h2 >start...</h2>
        <table class="table table-bordered">
                <tr>
                    <th>URL</th>
                    <th>TIME</th>
                    <th>NOTE</th>
                </tr>	
                
	    <?php 
		if(is_array($urls)&&!is_null($urls)) {
			foreach($urls as $val){
				//$htmlStr="<a href='".$val['url']."' target='_blank'>".$val['note']."</a>"."||".$val['time']."<br>";	
				$htmlStr="<a href='".$val['url']."' target='_blank'>".$val['title']."</a>"; 
				//echo $htmlStr;
        ?>
                <tr>
                    <td>
						<?php echo $htmlStr ?>
                    </td>
                    <td>
						<em>
						<?php echo $val['time'] ?>
						</em>
					</td>
                    <td>
						<?php echo $val['note'] ?>
					</td>
                </tr>
        <?php
				}
			}
		?>
      </table>
  </body>
</html>