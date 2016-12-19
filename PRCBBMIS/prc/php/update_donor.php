<?php 
	require('../dbconnect.php');

	$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
		
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE donor  WHERE did = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: ../donorlist.php");		
		
    }else {
        header("Location: ../donorlist.php");
    }	
?>