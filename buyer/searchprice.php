<?php 
require('../config/autoload.php'); 
include('../config/checklogin.php');
check_login();

$dao=new DataAccess();

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
	
$elements=array(
				"price"=>""
				);

$form=new FormAssist($elements,$_POST);


$labels=array(
				"price"=>"Total Price"
			);

$rules=array(
			"price"=>array("required"=>true,"integeronly"=>true)
			);
			
$validator = new FormValidator($rules,$labels);
		
if(isset($_POST["submit"]))
{
	if($validator->validate($_POST))
	{ 
		$_SESSION['price']=$_POST['price'];
		$price=$_SESSION['price'];
	
		 echo"<script> location.replace('price.php'); </script>";
	}
}
	

///	if($dao->insert($data,"property"))
	//	{
	//	echo "<script> alert('Property found');</script> ";	  
//echo"<script >location.href = 'searchproperty.php'</script>";
	//	}
	//	else
  //      {
			//$msg="Page not found";
	//	} }
  ?>  
    
<html>
<head>
	<h1>SEARCH PRICE</h1>
	<br></br>
</head>
<body>
	
	<form action="" method="POST" enctype="multipart/form-data">
Search by Price Less Than or Equal to:

<div class="row">
                    <div class="col-md-6">

<?= $form->textBox('price',array('class'=>'form-control')); ?>
						<span style="color:red;"><?= $validator->error('price'); ?></span>

</div>
		</div>
		<br></br>
		
		<button type="submit" name="submit">Search Price</button>
		<br></br> <br></br>
<?php include('footer.php'); ?>