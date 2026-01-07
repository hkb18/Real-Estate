<?php require('../config/autoload.php'); 
include("header.php");
include("dbcon.php");
	
$id=$_GET['id'];
$sql= "update buyer set bstatus='Rejected' where bid=".$id;
$conn->query($sql);
header('location:viewbuy.php');

?>
