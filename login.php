<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/LeftContentStyle.CSS">
	<link rel="stylesheet" type="text/css" href="css/box.CSS">

	<style>
		#header{
			background-color: #1C88E3;
			height: 50px;
			width: 100%;
		}
	</style>

</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12" id="header">
				
			</div>
		</div>
	</div>
</body>
</html>

<?php 
    ob_start();
    require_once'config/config.php';
	ini_set('session.cookie_httponly', true);
    if(!isset($_SESSION)){ 
        session_start();
        session_regenerate_id();
    }
    include ('lib/helper.php');
?>

<?php
    $username="";
    $password="";
	
    if(isset($_POST['submit'])){
        $username = mres($_POST['username']);
        $password = $_POST['password'];
        if(trim($username)==''){
			$msg = "Please input your username";
		}
		else if(trim($password)==''){
			$msg = "Please input password";
		}else{
            $sql = "
				SELECT 
					user_id,user_name,password,user_role
				FROM 
					tbluser
				WHERE 
					user_name = '{$username}' 
			   ";
            $query = mysql_query($sql);
            $numrows = mysql_num_rows($query);
            if ($numrows!=0){
                
                while ($row = mysql_fetch_assoc($query)){
                   	$dbuser_type = $row['user_role']; 
                    $dbuser_id = $row['user_id'];
                    $dbusername = $row['user_name'];
                    $dbpassword = $row['password'];
                }
				$password = md5($password);
                if($username == $dbusername && $password == $dbpassword){
				
				        $_SESSION['user_name'] = $dbusername;
				        $_SESSION['use_role'] = $dbuser_type;
				        $_SESSION['user_id'] = $dbuser_id;
					        header("Location: MainMenu.php?part=home");
				        exit;
                }else{
                    $msg = "Wrong passworld";	
                }
            }else{ 
				$msg = "Don't have account";
			}
        }
    }
?>



<!DOCTYPE html>
<html>
<head>
	<title>Welcome to SK</title>

	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<style type="">
	#login-msg{
		margin-left: 100px;
	}
	</style>

	<style type="text/css">
	.frm-signin{
		max-width: 300px;
		min-height: 280px;
		height: auto;
		padding: 19px 29px 29px;
		margin: 0 auto 20px;
		background-color: #fff;
		border: 1px solid #e5e5e5;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
		-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
		box-shadow: 0 1px 2px rgba(0,0,0,.05);
	}
	#s{
		height: 30px;
		padding: 7px 12px 1px 10px;
	}
	#in{
		width: 205px;
		height: 30px;
	}
</style>

</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4"></div>
	 		<div class="col-sm-4">
				<div class="login-box">
					<form method="POST">
						<div class="login-header">
							<img src="img/logo.png" alt="" class="" width="auto" height="100px" style="margin-left:39%">
						</div>
						<div style="margin-left:15%;margin-top:10px;margin-bottom:10px;padding-top:10px;padding-bottom:10px">
							<p class="text-center">	
								<div class="input-prepend input-append">
								  <span class="add-on" id="s">Username&nbsp;&nbsp;</span>
								  <input class="span2" id="in" type="text" placeholder="Please Input Your Username!" name="username" value="<?php echo $username;?>">											 
								</div>
							</p>

							<p class="text-center">
								<div class="input-prepend input-append">
								  <span class="add-on" id="s">Password&nbsp;&nbsp;&nbsp;</span>
								  <input class="span2" id="in" type="password" placeholder="Please Input Your Password!" name="password">
								</div>
							</p>
						</div>
						</hr>
						<?php if(isset($msg)){?>
							<p>
								<div class="alert alert-error" style="width: 300px; align="center" " >
									<button type="button " name="hid_msg" class="close" data-dismiss="alert">&times;</button>
										<p align="center" >Oh No! <?php echo $msg; ?></p>
								</div>
							</p>
						<?php } ?>
						<div class="login-footer">
								<button class="btn btn-primary login-button a" name="submit" type="submit">Login</button>
								<br>
							<div id="form-login-indent">
								<p style="color:white; padding-top:5px"><u>Forget your password?</u> <a href="" class="a-color"><i>Click Here!</i></a></p>
							</div>
						</div>
					</form>
				</div>
			</div>	
		</div>
</body>
</html>

<?php include_once 'layout/footer.php' ?>