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
				"pname"=>""
				);
$form=new FormAssist($elements,$_POST);

$labels=array(
			"pname"=>"Property Name"
			);

$rules=array(
			"pname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true)	
			);

$validator = new FormValidator($rules,$labels);

if(isset($_POST["submit"]))
{
	if($validator->validate($_POST))
	{ 	
		$_SESSION['pname']=$_POST['pname'];
		$pname=$_SESSION['pname'];

	   echo"<script> location.replace('pname.php'); </script>";	
	}
}
	

  ?>  
    
<html>
<head>	
	<h1>SEARCH Property Name</h1>
	<br></br>
</head>
<body>
	
	<form action="" method="POST" enctype="multipart/form-data">  

		
		<div class="row">
                    <div class="col-md-6">
Search by Property Name:

<?= $form->textBox('pname',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('pname'); ?></span>

</div>
</div>
		<br></br>
			<button type="submit" name="submit">Search Name</button>
</form>
</body>
</html>	
<br></br>
<?php include('footer.php'); ?>