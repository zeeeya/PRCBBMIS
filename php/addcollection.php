<?php 
require '../dbconnect.php';

if(!empty($_POST)){

	//variables
	$bloodamount = $_POST['bloodamount'];
	$collectiondate = $_POST['collectiondate'];
	$name = $_POST['name'];
	$donorno = $_POST['donorno'];
	$bloodbagused = $_POST['bloodbagused'];
	$unitserialno = $_POST['unitserialno'];
	$bloodtype = $_POST['bloodtype'];

	//validate
	$valid = true;

	//store
	if ($valid) {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO collection(bloodamount, collectiondate, name, donorno, bloodbagused,unitserialno,bloodtype)values (?,?,?,?,?,?,?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($bloodamount,$collectiondate, $name, $donorno, $bloodbagused, $unitserialno, $bloodtype));
		Database::disconnect();
		header("Location: ../viewcollection.php");
	}

	} ?>