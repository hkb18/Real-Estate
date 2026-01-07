<?php require('../config/autoload.php'); ?>
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
include("dbcon.php");

$b=$_SESSION['bid'];

$bkdate=date('Y-m-d',time());

$id=$_GET['id'];

$sql= "update property set pbstatus='B',bid=$b,bkdate='$bkdate' where pid=".$id;
$conn->query($sql);

//header('location:propertybooking.php');
//
//$data=array(
	//"bkdate"=>$bkdate,
	//);
//header('location:print.php');
//$query = $conn->query("select srid,pid from property");
//$fetch1 = $query->fetch_assoc();
//$srd=$fetch1("srid");
//$pid=$fetch1("pid");
//$sql1="insert into  booking (bid,srid,pid) values ($b,$srid,$pid)";
//$conn->query($sql1)
echo"<script >location.href = 'print.php'</script>"	;

?>
