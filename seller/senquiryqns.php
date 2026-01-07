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

	
$elements=array("s_se"=>"");

$form=new FormAssist($elements,$_POST);


$dao=new DataAccess();
$sr=$_SESSION['srid'];

$conn = mysqli_connect("localhost", "root", "", "realestate");

$sql="select pid from property where srid='$sr' and status='Rejected' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$p=$row['pid'];


//$_SESSION['s_seid']=$info['s_seid'];
//$se=$_SESSION['s_seid'];




//$pid=$_SESSION['pid'];
//echo $pid;



$labels=array(	
				"s_se"=>"Question");

$rules=array(
				"s_se"=>array("required"=>true,"minlength"=>3,"maxlength"=>50)
			);

$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn"]))
{ 
	if($validator->validate($_POST))
	{	
		$data=array(  
				's_se'=>$_POST['s_se'],
				'srid'=>$sr,
				//'pid'=>$pid
			'pid'=>$p,
			'estatus'=>'1'
				);
	 	
 		if($dao->insert($data,"s_sendenquiry"))
    	{
			echo "<script> alert('Enquiry send successfully');</script> ";
			   echo"<script> location.replace('viewenquiryreply.php'); </script>";
    	}
    	else
        {
			$msg="Enquiry failed to send";
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
                    <div class="col-md-6">
Question:

<?= $form->textarea('s_se',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('s_se'); ?></span>

</div>
</div>                    
<button type="submit" name="btn">Submit</button>
</form>


</body>

</html>
<?php include('footer.php'); ?>

