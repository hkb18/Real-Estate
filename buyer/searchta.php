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
				"ta"=>""
			);
$form=new FormAssist($elements,$_POST);

$labels=array("ta"=>"Total Area");

$rules=array(
			"ta"=>array("required"=>true,"integeronly"=>true)			
	);

$validator = new FormValidator($rules,$labels);

if(isset($_POST["submit"]))
{
	if($validator->validate($_POST))
	{ 
	
			$_SESSION['ta']=$_POST['ta'];
			$ta=$_SESSION['ta'];
		
		 echo"<script> location.replace('ta.php'); </script>";
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
	
<h1>SEARCH Total Area</h1>
	<br></br>
</head>
<body>
					
				<form action="" method="POST" enctype="multipart/form-data">
		
<div class="row">
                    <div class="col-md-6">
Search by Total Area (sq ft) :

<?= $form->textBox('ta',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('ta'); ?></span>

</div>
</div>
<br></br>					
	<button type="submit" name="submit">Search Total area</button>					
<br></br>		<br></br>
<?php include('footer.php'); ?>