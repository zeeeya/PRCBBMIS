<?php
	require '../dbconnect.php';

	if(!empty($_POST)){

		//variables
		date_default_timezone_set("Asia/Taipei");
		$did = 'D01-'.date("mdYhi");	

		$dname = $_POST['dname'];
		$daddress = $_POST['daddress'];
		$dbirthdate = $_POST['dbirthdate'];
		$dgender = $_POST['dgender'];
		$dreligion = $_POST['dreligion'];
		$dcard = $_POST['dcard'];
		$dcontact = $_POST['dcontact'];
		$dtype = $_POST['dtype'];
		$dnationality = $_POST['dnationality'];
		$demail = $_POST['demail'];		
		
		//validate
		$valid = true;

		//storing
		if($valid){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO donor (did, dname, daddress, dbirthdate, dgender, dreligion, dcard, dcontact, dtype, dnationality, demail) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
            $q->execute(array($did ,$dname, $daddress, $dbirthdate, $dgender, $dreligion, $dcard, $dcontact, $dtype, $dnationality, $demail));
            Database::disconnect();
            header("Location: ../viewdonor.php");
		}
	}
?>