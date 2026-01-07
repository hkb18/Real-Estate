<?php 

 require('../config/autoload.php'); 

include('dbcon.php'); 
?>	
<!--	Header checking for logout 	-->

<?php
$b=$_SESSION['bid'];
if($b==0)
	include('header.php');
else
   include('buyerheader.php');	
 ?>
<!--	Header checking for logout ended	-->

<?php

$bkdate=date('Y-m-d',time());

$dao=new DataAccess();

$b=$_SESSION['bid'];


$id=$_GET['id'];
$_SESSION['p']=$_GET['id'];
$p=$_SESSION['p'];
echo $p;

	$sql="insert into booking (bid,pid,bkdate,bkstatus) values ('$b','$p','$bkdate','B')";
		$conn->query($sql);
		echo $sql;
		
		$sql1= "update property set pbstatus='B',bid='$b',bkdate='$bkdate' where pid=".$p;
		$conn->query($sql1);
		echo $sql1;			
	
	//echo "<script> alert('New record created successfully');</script> ";
		echo"<script >location.href ='print2.php'</script>";


