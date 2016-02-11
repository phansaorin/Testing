<?php
  mysql_connect('localhost', 'root','') or die($connect_error);
  mysql_select_db('sk');
  $loggedtime = time() - 300; // 5 minutes
?>