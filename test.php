<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta charset="UTF-8">

	<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-8" charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
	<a href="?lang=EN">EN</a>
	<a href="?lang=KH">KH</a></br>

<?php 
		$conn = mysqli_connect("localhost", "root", "", "skillful");
		$field="menu_en";
		if (isset($_GET['lang'])) {
			if ($_GET['lang']=='KH') $field="menu_kh";}
		$sql = "select $field From menu";
		$result = $conn->query($sql);
		while ( $row = $result->fetch_assoc()) {
			echo utf8_encode($row["$field"])."<br>";
		}	
?>


</body>
</html>
