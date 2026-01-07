<?php require('../config/autoload.php'); ?>
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
$dao=new DataAccess();

$b=$_SESSION['bid'];

$bkdate=date('Y-m-d',time());

$id=$_GET['id'];

include('header.php'); 
include('dbcon.php'); 
	
$elements=array(
	"bname"=>"");
$form=new FormAssist($elements,$_POST);


$labels=array(
	"bname"=>"Buyer Name");

$rules=array(
			"bname"=>array("required"=>true,"minlength"=>3,"maxlength"=>35,"alphaspaceonly"=>true)
		
	);

$validator = new FormValidator($rules,$labels);

if(isset($_POST["submit"]))
{
	
	
	
	
	if($validator->validate($_POST))
	{ 
			
		
		
		
		
		$data=array(  
			
					'bname'=>$_POST['bname'],
					'bkstatus'=>'B',
			 		'bkdate'=>$bkdate
					);
		
		$sql="insert into  booking ('bid','pid') values('$b','$id')";
		$conn->query($sql);
		echo $sql;
		
		$sql1= "update property set pbstatus='B' where pid=".$id;
		$conn->query($sql1);
		echo $sql1;
			
	}
	if($dao->insert($data,"booking"))
	{ 		
		echo "<script> alert('New record created successfully');</script> ";
		echo"<script >location.href ='print.php'</script>";
	}
	else
    {
		 echo "<script> alert('Booking Failed');</script> ";
	
		echo"<script >location.href ='searchproperty.php'</script>";
	} 
	
}

  ?>
   

<html>
<head>
	
	
</head>
<body>
	
	<form action="" method="POST" enctype="multipart/form-data">

		
		<div class="row">
                    <div class="col-md-6">
Buyer Name:

<?= $form->textBox('bname',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('bname'); ?></span>

</div>
</div>
			<button type="submit" name="submit">Book</button>
		
<?php include('footer.php'); ?>