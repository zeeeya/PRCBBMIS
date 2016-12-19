<?php
	require '../dbconnect.php';

	if(!empty($_POST)){

		//variables
		$pname = $_POST['pname'];
		$paddress = $_POST['paddress'];
		$pbirthdate = $_POST['pbirthdate'];
		$pgender = $_POST['pgender'];
		$pcontact = $_POST['pcontact'];
	
		
		//validate
		$valid = true;

		//storing
		if($valid){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO patient (pname, paddress, pbirthdate, pgender, pcontact) values(?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
            $q->execute(array($pname, $paddress, $pbirthdate, $pgender, $pcontact));
            Database::disconnect();
            header("Location: ../viewpatient.php");
		}
	}
?>