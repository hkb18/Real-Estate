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
session_start();
$b=$_SESSION['bid'] ;
//$id=$_SESSION['id'];
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
			<th>Property Id</th>
			<th>PROPERTY NAME</th>
				<th>PROPERTY TYPE</th>
				<th>PRICE</th>
			<th>DISTRICT NAME</th>
			<th>AREA NAME</th>
			<th>SELLER NAME</th>
			<th>SELLER PHNO</th>
			<th>SELLER Email</th>
			<th>BUYER ID</th>
			<th>BOOKING DATE</th>			
			</tr>
		
	</thead>
<tbody>
                                   
 <?php

$sql = "SELECT * FROM property p,sellerreg s,district d,area a,proptype pt WHERE pt.propid=p.propid and  a.aid=p.aid and d.did=p.did and s.srid=p.srid and  pbstatus='B' and bid='$b'";
	
$result = $conn->query($sql);
	
$condition="bid=$b and pbstatus='B'";	

if ($result->num_rows > 0 && $condition)
{

 // output data of each row
    while($row = $result->fetch_assoc()) 
	{
			
      echo "<tr>  <td> " . $row["pid"]. "</td> <td> " . $row["pname"]. "</td> <td> " . $row["ptype"]. "</td> <td> " . $row["price"]. "</td> <td>" . $row["dname"]. "</td> <td>" . $row["aname"]. "</td> <td>" . $row["sname"]. "</td> <td>" . $row["sphno"]. "</td>  <td>" . $row["semail"]. "</td> <td>" . $row["bid"]. "</td> <td>" . $row["bkdate"]. "</td> </tr>";
	  //echo "<tr> <td colspan='3'  style='text-align:right'>ADVANCE AMOUNT PAID:</td><td> ", $row["advamt"], "</td></tr>";
	    
	}
}

 ?>

</table>
<a href="cancel.php">Cancel Booking</a>
<?php //echo"<script> location.replace('viewbuyer.php'); </script>";	?>
<input type="button" onclick="printData();" value="PRINT"/>
	
<a href="index.php">Home</a>
</div>
</div>
</div>

</form>


<?php include('footer.php');

?>