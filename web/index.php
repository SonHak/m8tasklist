<?php
	try{
		$hostname = "ec2-54-163-240-54.compute-1.amazonaws.com";
    	$dbname = "dc1md9da6pqja0";
    	$username = "vfefuxixlzddch";
   		$pw = "65743a71b2332c4a84d161eb2f6ffae1f8e49b4ea3fc971d49d692c966a76b1f";
    	$pdo = new PDO ("pgsql:host=$hostname;dbname=$dbname","$username","$pw");
	}catch (PDOException $e){
		echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    	exit;
	}

	if(isset($_POST['tarea'])){
		$query = $pdo->prepare("INSERT INTO tasklist (task) VALUES ('".$_POST['tarea']."')");
		$query->execute();

		echo "<form method='post' action='index.php'>
		      <label>Create New Task</label>
		      <input type='text' name='tarea'>
		      <input type='submit' value='Enviar'>
		      </form>
		      ";
	}else{
		echo "<form method='post' action='index.php'>
		      <label>Create New Task</label>
		      <input type='text' name='tarea'>
		      <input type='submit' value='Enviar'>
		      </form>
		      ";

	}

?>


<html>
	<head>
		<style>
			table {border: 1px solid black;}
		</style>
	</head>
	<body>
		<table>
			<thead>
				<th>ID</th>
				<th>Task</th>
				<th>Done</th>
			</thead>
			<tr></tr>
			<?php

				$query = $pdo->prepare("select * FROM tasklist");
				$query->execute();

				//anem agafant les fileres d'amb una amb una
				$row = $query->fetch();
				while ( $row ) {
				echo "<td>". $row['id']. "</td>";
				echo "<td>". $row['task']."</td>";
				echo "<td><input type='checkbox' id=".$row['id']." onfocus='checkear(event)'></td>";
				echo "<tr></tr>";
				$row = $query->fetch();
				}

			?>
		</table>


		<script>
			function checkear(event){
				var obj = event.currentTarget;
				if(obj.checked != true){
					obj.checked = true;
					obj.disabled = true;
				}
			}

		</script>
	</body>
</html>