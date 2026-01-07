<?php 

 require('../config/autoload.php'); 
	include("header.php");
	
$elements=array("proptype"=>"");

$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array(	
				"proptype"=>"Property Type");

$rules=array(
				"proptype"=>array("required"=>true,"minlength"=>4,"maxlength"=>10,"alphaspaceonly"=>true)
			);

$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn"]))
{
if($validator->validate($_POST))
{
$data=array(
				'ptype'=>$_POST['proptype']);

 if($dao->insert($data,"proptype"))
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:propertytype.php');
    }
    else
        {
			$msg="Existing property type";
			}
			
?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}


}


?>
<html>
<head>
<h1>ADD PROPERTY TYPE</h1>
</head>
<body>

 <form action="" method="POST" >
 
<div class="row">
                    <div class="col-md-6">
Property Type:

<?= $form->textBox('proptype',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('proptype'); ?></span>

</div>
</div>                    
<button type="submit" name="btn">Submit</button>
</form>


</body>

</html>


