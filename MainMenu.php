<?php
	ob_start();
	ini_set('session.cookie_httponly', true);
	if(!isset($_SESSION)){
        session_start();
    }
    include ('layout/header.php');
    require_once 'lib/helper.php';
?>
<script>
	$(function(){
		$("#load").hide();
		$("#sub").click(function(){
			$("#load").show();
			$("#load").html() = "";
		});
		$("#addN").click(function(){
			$("#load").show();
			$("#load").html() = "";
		});
		$("#edit").click(function(){
			$("#load").show();
			$("#load").html() = "";
		});
		$("#del").click(function(){
			$("#load").show();
			$("#load").html() = "";
		});
	});
</script>

<?php include 'layout/menu.php' ?>

<?php
	$part = $_GET['part'];
	if($part == "dashboard"){
		include ('inc/dashboard.php');
	}else if($part == ""){
		//include ('include/article_add.php');
	}else if($part == ""){
		//include ('include/article_add.php');
	}
?>

<?php include_once 'layout/footer.php'  ?>

