<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','proptype','propid='.$_GET['id']);

$elements=array(
        "proptype"=>$info[0]['ptype']
		);

	$form = new FormAssist($elements,$_POST);

$labels=array("proptype"=>"Property Type"
				);

$rules=array(
    "proptype"=>array("required"=>true,"minlength"=>4,"maxlength"=>10,"alphaspaceonly"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{
$data=array(

          'ptype'=>$_POST['proptype']
        
    );
  $condition='propid='.$_GET['id'];

    if($dao->update($data,'proptype',$condition))
    {
        $msg="Successfullly Updated";
header('location:viewpropertytype.php');
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
Property Type:

<?= $form->textBox('proptype',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('proptype'); ?></span>
</div>
</div>

<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>