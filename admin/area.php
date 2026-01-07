<?php 
require('../config/autoload.php'); 




	
	include("header.php");


$elements=array(
        "distno"=>"","aname"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array("distno"=>"District Name","aname"=>"Area Name" );

$rules=array(
		"distno"=>array("required"=>true),
    "aname"=>array("required"=>true,"minlength"=>5,"maxlength"=>20,"alphaspaceonly"=>true)
	
 
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn"]))
{
if($validator->validate($_POST))
{
$data=array(

        'did'=>$_POST['distno'] ,
		'aname'=>$_POST['aname']
		
    );
  
    if($dao->insert($data,"area"))
    {
        echo "<script> alert('New record created successfully');</script> ";
header('location:area.php');
    }
    else
        {$msg="Existing Area";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
   
}

}
?>
<html>
<head>
<h1>ADD AREA DETAILS</h1>
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

<button type="submit" name="btn"  >Submit</button>
</form>


</body>

</html>


