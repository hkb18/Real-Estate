<?php require('../config/autoload.php'); 
include("header.php");
include("dbcon.php");
	
$id=$_GET['id'];
$sql= "update property set status='Approved' where pid=".$id;
$conn->query($sql);
header('location:viewprop.php');

?>
