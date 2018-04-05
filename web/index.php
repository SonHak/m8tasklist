<?php
	include('connect.php');
	echo "hello world!";	
	

	//Create table
	function crearTabla(){
		$query = $pdo->prepare("CREATE TABLE IF NOT EXISTS 'tasklist'(
								'id' INT AUTO_INCREMENT NOT NULL,
								'task' varchar(100) NOT NULL,
								'desc' TEXT,
								'check' tinyint,
  			   				  )");
		$query -> execute();
	};

	//Insert date
	#function insertarDatos(){
#
	#}

?>