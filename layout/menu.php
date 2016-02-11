	<style>
		#divider{
			margin: 0px 0px 0px 0px;
		}
	</style>

	<div class="container-fluid">
		<div class="col-sm-2">
			<div class="menuBox">
				<ul class="nav">
					<!--<li class="dropdown-toggle">-->
					<li>
						<a class="btn btn-link dropdown-toggle" data-toggle="dropdown" href="#">
						<?php
											$conn = mysqli_connect("localhost", "root", "", "sk");
											$field="menu_en";
											if (isset($_GET['lang'])) {
												if ($_GET['lang']=='KH') $field="menu_kh";}
											$sql =  "select $field From menu where MENU_ID = 1";
											$result = $conn->query($sql);
											while ($row = $result->fetch_assoc()){
												echo $row[$field];
											}
											//error_reporting(E_ALL ^ E_NOTICE);
											$conn->close();
											?>
											</a>
																						
							<ul class="dropdown-menu">						
								<li><a href="MainMenu.php?part=">1</a></li>
								<li><a href="MainMenu.php?part=">2</a></li>
								<li><a href="MainMenu.php?part=">3</a></li>
								<li><a href="MainMenu.php?part=">4</a></li>
							</ul>
					</li>
					<li>
						<hr id="divider"></hr>
						<a href="MainMenu.php?part=dashboard" class="btn btn-link"><?php
																			$conn = mysqli_connect("localhost", "root", "", "sk");
																			$field="MENU_EN";
																			if (isset($_GET['lang'])) {
																				if ($_GET['lang']=='KH') $field="MENU_KH";}
																			$sql =  "select $field From menu where MENU_ID = 2";
																			$result = $conn->query($sql);
																			while ($row = $result->fetch_assoc()){
																				echo $row[$field];
																			}	
																			$conn->close();
																			?></a>
						<hr id="divider">
						<a href="MainMenu.php?part=dashboard" class="btn btn-link"><?php
																			$conn = mysqli_connect("localhost", "root", "", "sk");
																			$field="MENU_EN";
																			if (isset($_GET['lang'])) {
																				if ($_GET['lang']=='KH') $field="MENU_KH";}
																			$sql =  "select $field From menu where MENU_ID = 3";
																			$result = $conn->query($sql);
																			while ($row = $result->fetch_assoc()){
																				echo $row[$field];
																			}
																			$conn->close();
																			?></a>
						<hr id="divider">
						<a href="MainMenu.php?part=dashboard" class="btn btn-link"><?php
																			$conn = mysqli_connect("localhost", "root", "", "sk");
																			$field="MENU_EN";
																			if (isset($_GET['lang'])) {
																				if ($_GET['lang']=='KH') $field="MENU_KH";}
																			$sql =  "select $field From menu where MENU_ID = 4";
																			$result = $conn->query($sql);
																			while ($row = $result->fetch_assoc()){
																				echo $row[$field];
																			}
																			$conn->close();
																			?></a>
						<hr id="divider">
						<a href="MainMenu.php?part=dashboard" class="btn btn-link"><?php
																			$conn = mysqli_connect("localhost", "root", "", "sk");
																			$field="MENU_EN";
																			if (isset($_GET['lang'])) {
																				if ($_GET['lang']=='KH') $field="MENU_KH";}
																			$sql =  "select $field From menu where MENU_ID = 5";
																			$result = $conn->query($sql);
																			while ($row = $result->fetch_assoc()){
																				echo $row[$field];
																			}
																			$conn->close();
																			?></a>
																			<hr id="divider">
						<a href="MainMenu.php?part=dashboard" class="btn btn-link"><?php
																			$conn = mysqli_connect("localhost", "root", "", "sk");
																			$field="MENU_EN";
																			if (isset($_GET['lang'])) {
																				if ($_GET['lang']=='KH') $field="MENU_KH";}
																			$sql =  "select $field From menu where MENU_ID = 6";
																			$result = $conn->query($sql);
																			while ($row = $result->fetch_assoc()){
																				echo $row[$field];
																			}
																			$conn->close();
																			?></a>
						<a href="MainMenu.php?part=dashboard" class="btn btn-link"><?php
																			$conn = mysqli_connect("localhost", "root", "", "sk");
																			$field="MENU_EN";
																			if (isset($_GET['lang'])) {
																				if ($_GET['lang']=='KH') $field="MENU_KH";}
																			$sql =  "select $field From menu where MENU_ID = 7";
																			$result = $conn->query($sql);
																			while ($row = $result->fetch_assoc()){
																				echo $row[$field];
																			}
																			$conn->close();
																			?></a>													
					</li>
				</ul>
			</div>
		</div>	
	<div>
