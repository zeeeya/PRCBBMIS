<?php
    require '../dbconnect.php';
    $id = $_POST['delid'];
	
    if ( !empty($id)) {
		echo $id;
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM donor WHERE did LIKE ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
		header("Location: ../viewdonor.php");
    }else{
		header("Location: ../viewdonor.php");
	}
    
?>
