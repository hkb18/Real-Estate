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
					"bathroom"=>""
				);

$form=new FormAssist($elements,$_POST);

$labels=array("bathroom"=>"No.of bathroom");

$rules=array(
			"bathroom"=>array("required"=>true,"integeronly"=>true),
	);

$validator = new FormValidator($rules,$labels); 

if(isset($_POST["submit"]))
{
	if($validator->validate($_POST))
	{ 
	
		$_SESSION['bathroom']=$_POST['bathroom'];
		$bathroom=$_SESSION['bathroom'];
	
	  echo"<script> location.replace('bathroom.php'); </script>";
		
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
	
</head>
<body>
	
		<form action="" method="POST" enctype="multipart/form-data">
			
	 <br></br> <br></br>
<div class="row">
                    <div class="col-md-6">

Search by No.of Bathroom						
<?= $form->textBox('bathroom',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('bathroom'); ?></span>

</div>
</div>
<br></br>
			<button type="submit" name="submit">Search No.of Bathroom </button>		
						<br></br><br></br>
<?php include('footer.php'); ?>