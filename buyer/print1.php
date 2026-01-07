<?php require('../config/autoload.php');

include('../config/checklogin.php');
check_login();


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
<script>
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>

<?php 
include("dbcon.php");

$b=$_SESSION['bid'] ;
//$id=$_GET['id'];
//$p=$_SESSION['p'];
//echo $b; echo $p;
$id=$_GET['id'];
$_SESSION['p']=$_GET['id'];
$p=$_SESSION['p'];
//echo $p;
?>
<div class="row">
<div class="col-md-12">
<div class="table-responsive">
	<table border="1"  id="printTable" style="width:100%" >
	<thead>
		<center> Real Estate </center>
                           
			<tr>
			<th style="text-align:left">BillNo.1</th>
			<th colspan="2" style="text-align:left"></th>
 			<th style="text-align:left" >Date:<?php echo  date("Y/m/d"); ?></th>
			</tr>
		
			<tr>
			<th>BOOKING ID</th>
			<th>Property Id</th>
			<th>BUYER ID</th>
			<th>BOOKING DATE</th>
			<th>PROPERTY NAME</th>
			<th>PROPERTY TYPE</th>
			<th>PRICE</th>
			<th>DISTRICT NAME</th>
			<th>AREA NAME</th>
			<th>SELLER NAME</th>
			<th>SELLER PHNO</th>
			<th>SELLER Email</th>
				
			</tr>
		
	</thead>
<tbody>
                                   
 <?php

$sql = "SELECT * FROM booking  WHERE  bkstatus='B' and bid='$b'and pid='$p'";
	$conn->query($sql);
	
	
$result = $conn->query($sql);
	
	
	
	$sql1 = "SELECT * FROM property p,sellerreg s,district d,area a,proptype pt WHERE pt.propid=p.propid and  a.aid=p.aid and d.did=p.did and s.srid=p.srid and  pbstatus='B' and bid='$b' and pid=$p";
	
	
$result1 = $conn->query($sql1);
//$condition="bid=$b and bkstatus='B'";	
	//echo $sql; echo $sql1;

if ($result->num_rows > 0 && $result1->num_rows >0)
{

 // output data of each row
  //  while($row = $result->fetch_assoc() && $row1 = $result1->fetch_assoc()) 
	while($row1 = $result1->fetch_assoc())
	{	
		while($row = $result->fetch_assoc())
		{
		//	echo "<tr><td> " . $row["bkid"]. "</td></tr>";		
	
		
      echo "<tr> <td> " . $row["bkid"]. "</td><td> " . $row1["pname"]. "</td> <td> " . $row1["bid"]. "</td> <td>" . $row1["bkdate"]. "</td>  <td> " . $row1["pname"]. "</td> <td> " . $row1["ptype"]. "</td> <td> " . $row1["price"]. "</td> <td>" . $row1["dname"]. "</td> <td>" . $row1["aname"]. "</td> <td>" . $row1["sname"]. "</td> <td>" . $row1["sphno"]. "</td>  <td>" . $row1["semail"]. "</td> </tr>";
	  //echo "<tr> <td colspan='3'  style='text-align:right'>ADVANCE AMOUNT PAID:</td><td> ", $row["advamt"], "</td></tr>";
		//echo "<tr><td> " . $row["bkid"]. "</td></tr>";  
	    //<td>" . $row["bkdate"]. "</td>
	}
	}
}
 ?>

</table>
	<br></br>
	<button type="submit" name="submit" ><a href="cancel1.php">Cancel Booking</a></button>
<?php //echo"<script> location.replace('viewbuyer.php'); </script>";	?>
<input type="button" onclick="printData();" value="PRINT"/>
	

</div>
</div>
</div>

</form>

<br></br><br></br><br></br>
<?php include('footer.php');?>