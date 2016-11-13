<?php 
//error_reporting(E_ALL ^ E_NOTICE);//解决 Notice: Undefined variable: comments 
require_once '../deal/connect.php';
?>
<!DOCTYPE html>
<head>
	<title>Contact Form One</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="../css/templatemo_style.css" rel="stylesheet" type="text/css">
</head>
<body class="templatemo-bg-image-2">
	<div class="container">
		<div class="col-md-12">			
			<form class="form-horizontal templatemo-contact-form-1" role="form" action="tempurl.deal.php" method="post">
				<div class="form-group">
					<div class="col-md-12">
						<h1 class="margin-bottom-15">YOUR URLS <small><a href="../index.php" >Show...</a></small></h1>
					</div>
				</div>	
				<div class="form-group">
		          <div class="col-md-12">
		            <label for="titleValue" class="control-label">TITLE:</label>
		            <div class="templatemo-input-icon-container">
		            	<i class="fa fa-info-circle"></i>
		            	<input type="text" class="form-control" name="titleValue" placeholder="">
		            </div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		            <label for="urlValue" class="control-label">URL*:</label>
		            <div class="templatemo-input-icon-container">
		            	<i class="fa fa-globe"></i>
		            	<input type="url" class="form-control" name="urlValue" placeholder="">
		            </div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		            <label for="noteValue" class="control-label">NOTE:</label>
		            <div class="templatemo-input-icon-container">
		            	<i class="fa fa-pencil-square-o"></i>
		            	<textarea rows="8" cols="50" class="form-control" name="noteValue" placeholder=""></textarea>
		            </div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		            <input type="submit" value="SAVE THIS URL" class="btn btn-success pull-right">
		          </div>
		        </div>		    	
		      </form>		      
		</div>
	</div>
</body>
</html>