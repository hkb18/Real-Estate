<?php 

require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
	
$elements=array(
	"bname"=>"","busername"=>"","bpassword"=>"","cpass"=>"","bemail"=>"","bphno"=>"","bgender"=>"","bproof"=>""
			);

$form=new FormAssist($elements,$_POST);

$dao=new DataAccess();

$labels=array("bname"=>"Buyer Name","busername"=>"Username","bpassword"=>"Password","cpass"=>"Confirm Password","bemail"=>"Email id","bphno"=>"Mobile no","bgender"=>"Gender","bproof"=>"Proof");

$rules=array(
			"bname"=>array("required"=>true,"minlength"=>3,"maxlength"=>45,"alphaspaceonly"=>true,'onclick'=>"enable_text(this.checked)"),
		

			"busername"=>array("required"=>true,"minlength"=>4,"maxlength"=>15,"unique"=>array("field"=>"busername","table"=>"buyer")),
			"bpassword"=>array("required"=>true),
    		"cpass"=>array("required"=>true,"compare"=>array("comparewith"=>"bpassword","operator"=>"=")),

			"bemail"=>array("required"=>true,"email"=>true,"unique"=>array("field"=>"bemail","table"=>"buyer")),
			"bphno"=>array("required"=>true,"minlength"=>10,"maxlength"=>10,"integeronly"=>true,"unique"=>array("field"=>"bphno","table"=>"buyer")),
			"bgender"=>array("required"=>true,"exist"=>array("male","female")),
			"bproof"=>array('filerequired'=>true)
);
$validator = new FormValidator($rules,$labels);


if(isset($_POST["submit"]))
{
	if($validator->validate($_POST))
	{ 
		if($fileName=$file->doUploadRandom($_FILES['bproof'],array('.jpg','.png','.jpeg','.JPG','.PNG','.JPEG'),100000,5,'../uploads'))
		{ 
		$data=array(
					'bname'=>$_POST['bname'],
					'busername'=>$_POST['busername'],
					'bpassword'=>$_POST['bpassword'],
					'bemail'=>$_POST['bemail'],
					'bphno'=>$_POST['bphno'],
					'bgender'=>$_POST['bgender'],
					'bproof'=>$fileName,
					'bstatus'=>'Wait'
					);
			if($dao->insert($data,"buyer"))
			{
			    echo "<script> alert('New record created successfully');</script> ";
				echo"<script >location.href = 'buyerlogin.php'</script>"	;
			}
			else
        	{
				$msg="Registration failed";
			} 
		}
		else
			echo $file->errors();
	}

}
?>

<html>

<head>
	<h1>BUYER REGISTRATION	</h1>
	</head>
	<body>
	
<form action="" method="POST" enctype="multipart/form-data">
	
Name of Buyer:

<div class="row">
                    <div class="col-md-6">

<?= $form->textBox('bname',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('bname'); ?></span>

</div>
</div>

Email id:
		
<div class="row">
                    <div class="col-md-6">
<?=$form->textBox('bemail',array('class'=>'form-control'));?>
<span style="color: red"><?=$validator->error('bemail');?></span>
						
</div>
</div>
	
Username:
	
		<div class="row">
                    <div class="col-md-6">
<?=$form->textBox('busername',array('class'=>'form-control'));?>
<span style="color: red;"><?=$validator->error('busername')?></span>
		
</div>
</div>
        			
Password:
		<div class="row">
                    <div class="col-md-6">
<?=$form->passwordbox('bpassword',array('class'=>'form-control'));?>
<span style="color: red;"><?=$validator->error('bpassword')?></span>
</div>
</div>
		
Confirm Password:
		<div class="row">
                    <div class="col-md-6">
<?= $form->passwordBox('cpass',array('class'=>'form-control'));?>
<span style="color:red;"><?=$validator->error('cpass');?></span>
</div>
</div>
		
	
Gender:					
		<div class="row">
                    <div class="col-md-6">
						
<?php
     $options=array('Male'=>"male","Female"=>"female");
     echo $form->radioGroup('bgender',array(),$options); ?>
<span style="color:red;"><?=$validator->error('bgender');?></span>
</div>
</div>
	
Mobile no:
<div class="row">
                    <div class="col-md-6">
<?= $form->textBox('bphno',array('class'=>'form-control'));?>
<span style="color:red;"><?=$validator->error('bphno');?></span>	
</div>
</div>
            
            <div class="row">
                    <div class="col-md-6">
Proof(Eg:Aadhar Card):

<?= $form->fileField('bproof',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('bproof'); ?></span>

</div>
</div>
<br></br>	
<button type="submit" name="submit">Register</button>
<br></br>						
		</form>						
	</body>
</html>
<?php include('footer.php'); ?>