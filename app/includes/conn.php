<?php
	//1
	$db = new mysqli('localhost', 'root', '', 'cv');
	if($db->connect_errno > 0){die('Unable to connect to database [' . $db->connect_error . ']');}

?>