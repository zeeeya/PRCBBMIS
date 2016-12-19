<?php
	require '../dbconnect.php';

	if(!empty($_POST)){

		//variables
                $name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$usertype = $_POST['usertype'];
	
		
	
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO user (name, username, password, usertype) values(?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
            $q->execute(array($name, $username, $password, $usertype));
            Database::disconnect();
            header("Location: ../viewuser.php");
		}
	
?>