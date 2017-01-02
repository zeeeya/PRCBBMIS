<?php
	require '../dbconnect.php';

	if(!empty($_POST)){

		//variables
		$bldpressure = $_POST['bldpressure'];
		$pulserate = $_POST['pulserate'];
		$bodytemp = $_POST['bodytemp'];
		$genapp = $_POST['genapp'];
		$skin = $_POST['skin'];
		$heent = $_POST['heent'];
		$hnl = $_POST['hnl'];
		$remarks = $_POST['remarks'];
		$reason = $_POST['reason'];


		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO examination (bldpressure, pulserate, bodytemp, genapp, skin, heent, hnl, remarks, reason) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
        $q->execute(array($bldpressure, $pulserate, $bodytemp, $genapp, $skin, $heent, $hnl, $remarks, $reason));
        Database::disconnect();
	}
?>
