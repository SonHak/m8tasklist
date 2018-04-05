<?php
	include('connect.php');
	
	//Create table
	$query = $pdo->prepare("CREATE TABLE IF NOT EXISTS 'tasklist'(
							'id' INT AUTO_INCREMENT NOT NULL,
							'task' varchar(100) NOT NULL,
							'desc' TEXT,
							'check' tinyint,
			  			   )");

	$query -> execute();



?>