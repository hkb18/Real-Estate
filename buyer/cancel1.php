<!--	Header checking for logout 	-->

<?php
session_start();
$b=$_SESSION['bid'];
if($b==0)
	include('header.php');
else
   include('buyerheader.php');	
 ?>
<!--	Header checking for logout ended	-->
<?php	

include("dbcon.php");

$conn = mysqli_connect("localhost", "root", "", "realestate");

$sql="select pid from property where bid='$b' and pbstatus='B' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$p=$row['pid'];
echo $sql;

//$pid=$_SESSION['pid'];
//echo $pid;
//$b = $_GET['id'];

//$date1=date('Y-m-d',time());
//$sql = "update property set bkstatus='N' and bid ='null' and bkdate='null' where  bkid=".$bkid;

$sql1 = "update property set pbstatus='N',bid=NULL ,bkdate=NULL where pbstatus='B' and pid='$p' ";
$conn->query($sql1);
echo $sql1;
$sql2="update booking set bkstatus='C' where bkstatus='B' and pid='$p'";
$conn->query($sql2);
echo $sql2;
//echo "<script> alert('Cancellation successfully');</script> ";
echo"<script> location.replace('viewbookedprop.php'); </script>";
//header('location:searchproperty.php');

?>

