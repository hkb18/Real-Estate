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
	"bedroom"=>"");

$form=new FormAssist($elements,$_POST);

$dao=new DataAccess();

$labels=array("bedroom"=>"No.of Bedroom");

$rules=array(
			"bedroom"=>array("required"=>true,"integeronly"=>true)
			);

$validator = new FormValidator($rules,$labels);

if(isset($_POST["submit"]))
{
	if($validator->validate($_POST))
	{ 
		$_SESSION['bedroom']=$_POST['bedroom'];
		$bedroom=$_SESSION['bedroom'];

		 echo"<script> location.replace('bedroom.php'); </script>";
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
<body>
					
<form action="" method="POST" enctype="multipart/form-data">

	<br></br><br></br>
<div class="row">
                    <div class="col-md-6">
Search by No.of Bedrooms:

<?= $form->textBox('bedroom',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('bedroom'); ?></span>

</div>
</div>	 
	<br></br>
		<button type="submit" name="submit">Search No.of Bedroom</button>
	<br></br><br></br>
<?php include('footer.php'); ?>