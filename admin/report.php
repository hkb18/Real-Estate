<?php 
 require('../config/autoload.php'); 
include("header.php");

 
?>
<html>
<head>
</head>
<body>



<header class="py-4">
	<div class="container">
<ul class="menu mt-2 ml-auto">

<button type="submit" name="btn_insert"><a href="reportbuyer.php">AcceptedBuyers</a></button>	 	 

<button type="submit" name="btn_insert"><a href="reportseller.php">AcceptedSellers</a></button>	 

<button type="submit" name="btn_insert"><a href="reportproperty.php">AcceptedProperty</a></button>	 

<button type="submit" name="btn_insert"><a href="reportbuyerrej.php">RejectedBuyer</a></button>	 

<button type="submit" name="btn_insert"><a href="reportsellerrej.php">RejectedSeller</a></button>	 

<button type="submit" name="btn_insert"><a href="reportpropertyrej.php">RejectedProperty</a></button>	 

<button type="submit" name="btn_insert"><a href="reportpropbook.php">BookedProperty</a></button>	 

<button type="submit" name="btn_insert"><a href="reportbkdate.php">bkdate</a></button>
	 
<button type="submit" name="btn_insert"><a href="reportpropnb.php">NotBookedProperty</a></button>
		</ul>
</div>
</header>

</body>

</html>