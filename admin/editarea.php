<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','area','aid='.$_GET['id']);

$elements=array(
        "aname"=>$info[0]['aname'],"distno"=>$info[0]['did']
		);

	$form = new FormAssist($elements,$_POST);

$labels=array("aname"=>"Area Name","distno"=>"District Name"
				);

$rules=array(
	"distno"=>array("required"=>true),
    "aname"=>array("required"=>true,"minlength"=>5,"maxlength"=>20,"alphaspaceonly"=>true)
    

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{
$data=array(
			'did'=>$_POST['distno'] ,
          'aname'=>$_POST['aname']
		
        
    );
  $condition='aid='.$_GET['id'];

    if($dao->update($data,'area',$condition))
    {
        $msg="Successfullly Updated";
header('location:viewarea.php');
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

<?php
                    $options = $dao->createOptions('dname','did',"district");
                    echo $form->dropDownList('distno',array('class'=>'form-control'),$options);

?>
<span style="color:red;"><?= $validator->error('distno'); ?></span>
</div>
</div>
		
<div class="row">
                    <div class="col-md-6">
Area Name:

<?= $form->textBox('aname',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('aname'); ?></span>

</div>
</div>


<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>