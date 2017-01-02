<?php
	require '../dbconnect.php';

	if(!empty($_POST)){

		//variables
		$actname = $_POST['actname'];
		$detail = $_POST['detail'];
		$place = $_POST['place'];
		$date = $_POST['date'];
		


		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO activityschedule (actname, detail, place, date) values(?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
                $q->execute(array($actname, $detail, $place, $date));
                Database::disconnect();
                header("Location: ../viewactivityscheduling.php");
	}
?>
