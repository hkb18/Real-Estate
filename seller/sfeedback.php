<?php 
require('../config/autoload.php'); 
include('../config/checksellerlogin.php');
check_login();
?>
<!--	Header checking for logout 	-->

<?php
$sr=$_SESSION['srid'];

if($sr==0)
	include('header.php');
else
   include('sellerheader.php');	
 ?>
<!--	Header checking for logout ended	-->
<?php	
$elements=array("fb"=>"");

$form=new FormAssist($elements,$_POST);

$dao=new DataAccess();

$labels=array(	
				"fb"=>"Feedback"
			);

$rules=array(
				"fb"=>array("required"=>true,"minlength"=>3,"maxlength"=>100)
			);

$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn"]))
{
	if($validator->validate($_POST))
	{
		$data=array('fb'=>$_POST['fb']);

		if($dao->insert($data,"feedback"))
    	{
        	echo "<script> alert('Feedback send successfully');</script> ";
			//header('location:sellerindex.php');
			echo"<script >location.href = 'sellerindex.php'</script>";
    	}
    	else
        {
			$msg="Failed to send Feedback";
		}
			
?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}
	
}

?>
<html>
<head>
</head>
<body>

<form action="" method="POST" >
 
<div class="row">
	<div class="col-md-6"><BR></BR>
Feedback:<BR></BR>

<?= $form->textarea('fb',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('fb'); ?></span>
<BR></BR>
</div>
</div>
	
<button type="submit" name="btn">Submit</button><BR></BR>
	
</form>
</body>
</html>
<br></br>  
<?php include('footer.php'); ?>