<?php
	try{
		$hostname = "ec2-54-163-240-54.compute-1.amazonaws.com";
    	$dbname = "dc1md9da6pqja0";
    	$username = "vfefuxixlzddch";
   		$pw = "65743a71b2332c4a84d161eb2f6ffae1f8e49b4ea3fc971d49d692c966a76b1f";
    	$pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
	}catch (PDOException $e){
		echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    	exit;
	}
?>