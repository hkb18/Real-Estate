<?php 
require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
	
$elements=array(
				"sname"=>"","susername"=>"","spassword"=>"","cpass"=>"","semail"=>"","sphno"=>"","sgender"=>"","sproof"=>""
				);

$form=new FormAssist($elements,$_POST);

$dao=new DataAccess();

$labels=array(
				"sname"=>"Seller Name","susername"=>"Username","spassword"=>"Password","cpass"=>"Confirm Password","semail"=>"Email id","sphno"=>"Mobile no","sgender"=>"Gender","sproof"=>"Proof"
			);

$rules=array(
			"sname"=>array("required"=>true,"minlength"=>3,"maxlength"=>45,"alphaspaceonly"=>true),
			//"slname"=>array("required"=>true,"minlength"=>3,"maxlength"=>20,"alphaspaceonly"=>true),
			"susername"=>array("required"=>true,"minlength"=>4,"maxlength"=>15,"unique"=>array("field"=>"susername","table"=>"sellerreg")),
			"spassword"=>array("required"=>true),
    		"cpass"=>array("required"=>true,"compare"=>array("comparewith"=>"spassword","operator"=>"=")),			
			"semail"=>array("required"=>true,"email"=>true,"unique"=>array("field"=>"semail","table"=>"sellerreg")),
			"sphno"=>array("required"=>true,"minlength"=>10,"maxlength"=>10,"integeronly"=>true,"unique"=>array("field"=>"sphno","table"=>"sellerreg")),
			"sgender"=>array("required"=>true,"exist"=>array("male","female")),
			"sproof"=>array('filerequired'=>true)
			);
$validator = new FormValidator($rules,$labels);


if(isset($_POST["submit"]))
{
	if($validator->validate($_POST))
	{
		if($fileName=$file->doUploadRandom($_FILES['sproof'],array('.jpg','.png','.jpeg','.JPG','.PNG','.JPEG'),100000,5,'../uploads'))
		{ 
			$data=array(
					'sname'=>$_POST['sname'],
					'susername'=>$_POST['susername'],
					'spassword'=>$_POST['spassword'],
					'semail'=>$_POST['semail'],
					'sphno'=>$_POST['sphno'],
					'sgender'=>$_POST['sgender'],
					'sproof'=>$fileName,
					'status'=>'Wait'
					);
			if($dao->insert($data,"sellerreg"))
			{
				echo "<script> alert('Registered successfully.Wait for ADMIN to approve');</script> ";
				//header('location:sellerlogin.php');
				echo"<script >location.href = 'sellerlogin.php'</script>"	;		
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
	<h1>SELLER REGISTRATION	</h1><br></br>
</head>
<body>
	
	<form action="" method="POST" enctype="multipart/form-data">
		
Name of Seller:

<div class="row">
                    <div class="col-md-6">

<?= $form->textBox('sname',array('class'=>'form-control')); ?>
	<span style="color:red;"><?= $validator->error('sname'); ?></span>

	</div>
</div>
 

Email id:
		
<div class="row">
                   <div class="col-md-6">
	<?=$form->textBox('semail',array('class'=>'form-control'));?>
	<span style="color: red"><?=$validator->error('semail');?></span>
						
	</div>
</div>
		
Username:
<div class="row">
                    <div class="col-md-6">
						<?=$form->textBox('susername',array('class'=>'form-control'));?>
						<span style="color: red;"><?=$validator->error('susername')?></span>
		
	</div>
</div>
        			
Password:
<div class="row">
                   <div class="col-md-6">
						<?=$form->passwordbox('spassword',array('class'=>'form-control'));?>
						<span style="color: red;"><?=$validator->error('spassword')?></span>
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
   echo $form->radioGroup('sgender',array(),$options); ?>
<span style="color:red;"><?=$validator->error('sgender');?></span>
	</div>
</div>
		Mobile no:
<div class="row">
                    <div class="col-md-6">
			<?= $form->textBox('sphno',array('class'=>'form-control'));?>
			<span style="color:red;"><?=$validator->error('sphno');?>		</span>	
	</div>
</div>
            
<div class="row">
                    <div class="col-md-6">
Proof(Eg:Aadhar Card):

<?= $form->fileField('sproof',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('sproof'); ?></span>

	</div>
</div>
		
<br></br>		
<button type="submit" name="submit"  >Register</button>
<br></br>							

</form>
</body>
</html>
<?php include('footer.php'); ?>