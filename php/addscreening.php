<?php
	require '../dbconnect.php';

	if(!empty($_POST)){

		//variables
		$weight = $_POST['weight'];
		$spgravity = $_POST['spgravity'];
		$hemgb = $_POST['hemgb'];
		$hmtcrt = $_POST['hmtcrt'];
		$rbc = $_POST['rbc'];
		$wbc = $_POST['wbc'];
		$pltcount = $_POST['pltcount'];
		$screendate = $_POST['screendate'];


		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO screening (weight, spgravity, hemgb, hmtcrt, rbc, wbc, pltcount, screendate) values(?, ?, ?, ?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
        $q->execute(array($weight, $spgravity, $hemgb, $hmtcrt, $rbc, $wbc, $pltcount, $screendate));
        Database::disconnect();
	}
?>