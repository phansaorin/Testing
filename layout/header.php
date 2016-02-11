<?php/*
if(!isset($_SESSION['username'])){ 
        session_start();
		session_regenerate_id();
} 
if(!isset($_SESSION['username'])){
	header("location: logout.php");
}*/
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-8" charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 box">
				<div class="col-sm-2">
					<img src="" class="" width="75px" height="75px" style="padding-top:5px">				
				</div>
				<p class="col-sm-7">					
					<a href="?lang=EN" style="color:black">English</a> / 
					<a href="?lang=KH" style="color:black">ខ្មែរ</a>
					</p>
				<div class="col-sm-1 pull-right">
					<img src="img/Profile.jpg" class="img-circle" width="75px" height="75px" style="padding-top:5px">
				</div>
				<div class="col-sm-2">
					<h3 class="pull-right">Welcome<br>
						<div class="btn-group pull-right">
							<a class="btn btn-inverse" style="color:black" href="#">
							    <?php //echo $_SESSION['username'];?>
							    Sophanith
							</a>
							<a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
							    <span class="caret" style="color:black"></span>
							</a>
								<ul class="dropdown-menu">
									<li>
							            <a href="main_page.php?part=">
							                <i class="icon-edit"></i>&nbsp;&nbsp;Change Password
							            </a>
							        </li>
									<li>
							            <a href="#">
							                <i class="icon-off"></i>&nbsp;&nbsp;Logout
							            </a>
							        </li>
								</ul>
						</div>
					</h3>
				</div>	
			</div>
		</div>
	</div>
