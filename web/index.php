<?php
	if(include('connect.php')){
		echo "hello world!";	
	}
	crearTabla();
	insertarDatos("Tarea1","Esta es la primera tarea",1);


	$query = $pdo->prepare("select * FROM tasklist");
	$query->execute();

	//anem agafant les fileres d'amb una amb una
	$row = $query->fetch();
	while ( $row ) {
	echo $row['task']." - " . $row['desc']." - ".$row['check']."<br/>";
	$row = $query->fetch();
	}



	//Create table
	function crearTabla(){
		$query = $pdo->prepare("CREATE TABLE IF NOT EXISTS 'tasklist'(
								'id' INT AUTO_INCREMENT NOT NULL,
								'task' varchar(100) NOT NULL,
								'desc' TEXT,
								'check' tinyint,
  			   				  )");
		$query->execute();
	};

	//Insert date
	function insertarDatos($tarea,$descrip,$hecho){
		$query = $pdo->prepare("INSERT INTO tasklist VALUES(:task, :desc, :check)");
		$query->execute(array(
			"task" => $tarea,
			"desc" => $descrip,
			"check" => $hecho
		));
	}




?>