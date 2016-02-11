<?php
ob_start();
if(!isset($_SESSION)){ 
	session_start(); 
	} 
?>
<?php
if(session_destroy()){
	header("location: index.php");
}
?>