<?php
	try{
		$hostname = "ec2-54-163-240-54.compute-1.amazonaws.com";
    	$dbname = "dc1md9da6pqja0";
    	$username = "vfefuxixlzddch";
   		$pw = "65743a71b2332c4a84d161eb2f6ffae1f8e49b4ea3fc971d49d692c966a76b1f";
    	$pdo = new PDO ("pgsql:host=$hostname;port=5432;dbname=$dbname","$username","$pw");
	}catch (PDOException $e){
		echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    	exit;
	}

	/*
	//crae la tabla
	$query = $pdo->prepare("CREATE TABLE IF NOT EXISTS 'tasklist'(
								'id' INT AUTO_INCREMENT NOT NULL,
								'task' varchar(100) NOT NULL,
								'desc' TEXT,
								'check' tinyint,
  			   				  )");
	$query->execute();


	//inserta datos
	$query = $pdo->prepare("INSERT INTO tasklist VALUES(:task, :desc, :check)");
	$query->execute(array(
		"task" => "tarea1",
		"desc" => "descripcion1",
		"check" => 1
	));

	*/
	$query = $pdo->prepare("select * FROM tasklist");
	$query->execute();

	//anem agafant les fileres d'amb una amb una
	$row = $query->fetch();
	while ( $row ) {
	echo $row['id']." - " . $row['task']."<br/>";
	$row = $query->fetch();
	}



	
	/*
	crearTabla();
	
	insertarDatos("Tarea1","Esta es la primera tarea",1);
	
	*/


	//Create table
	

	//Insert date
	function insertarDatos($tarea,$descrip,$hecho){
		
	}




?>