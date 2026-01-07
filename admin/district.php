<?php 

 require('../config/autoload.php'); 
	include("header.php");
	
$elements=array("dname"=>"");

$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array(	
				"dname"=>"District Name");

$rules=array(
				"dname"=>array("required"=>true,"minlength"=>6,"maxlength"=>18,"alphaonly"=>true)
			);

$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn"]))
{
if($validator->validate($_POST))
{
$data=array('dname'=>$_POST['dname']);

 if($dao->insert($data,"district"))
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:district.php');
    }
    else
        {
			$msg="Existing District";
			}
			
?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}


}


?>
<html>
<head>
<h1>ADD DISTRICT DETIALS</h1>
</head>
<body>

 <form action="" method="POST" >
 
<div class="row">
                    <div class="col-md-6">
District Name:

<?= $form->textBox('dname',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('dname'); ?></span>

</div>
</div>                    
<button type="submit" name="btn">Submit</button>
</form>


</body>

</html>


