<?php 

	session_start();
    
    require("dbconnect_bbs2.php");

    $id=$_GET['id'];

    $sql='DELETE FROM `tweets` WHERE id=?';
    $data=array($id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    header("Location:bbs2.php");

?>