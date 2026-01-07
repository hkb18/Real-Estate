<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','district','did='.$_GET['id']);

$elements=array(
        "dname"=>$info[0]['dname']
		);

	$form = new FormAssist($elements,$_POST);

$labels=array("dname"=>"District Name"
				);

$rules=array(
    "dname"=>array("required"=>true,"minlength"=>6,"maxlength"=>18,"alphaonly"=>true)
    

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{
$data=array(

        'dname'=>$_POST['dname']
        
    );
  $condition='did='.$_GET['id'];

    if($dao->update($data,'district',$condition))
    {
        $msg="Successfullly Updated";
header('location:viewdistrict.php');
    }
    else
        {$msg="Failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}


}


	
	
	
	
?>

<html>
<head>
	<style>
		.form{
		border:3px solid blue;
		}
	</style>
</head>
<body>


	<form action="" method="POST" >
 
<div class="row">
                    <div class="col-md-6">
District Name:

<?= $form->textBox('dname',array('class'=>'form-control')); ?>
<span style="color:red;"<?= $validator->error('dname'); ?></span>

</div>
</div>

<div class="row">
                    <div class="col-md-6">


<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>