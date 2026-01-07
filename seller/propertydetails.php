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
$file=new FileUpload();
$elements=array(
				"propid"=>"","pname"=>"","did"=>"","areano"=>"","ta"=>"","bedroom"=>"","bathroom"=>"","dimensions"=>"","price"=>"","pdesc"=>"","pimage"=>""	);


$form=new FormAssist($elements,$_POST);

$dao=new DataAccess();
//$_SESSION['pid']=$info['pid'];
//$pid=$_SESSION['pid'];
$sr=$_SESSION['srid'];
//$sql="UPDATE property SET srid='$sr' WHERE pid='$pid'";
//$result = $conn->query($sql);
//$row = $result->fetch_assoc();
//$sym=$row['sympid'];

$labels=array(
				"propid"=>"Property Type","pname"=>"Property Name","did"=>"District Name","areano"=>"Area Name","ta"=>"Total size of plot","bedroom"=>"Total no.of bedroom","bathroom"=>"Total no.of bathroom","dimensions"=>"Dimension (Length x Breadth) of property","price"=>"Price of Plot","pdesc"=>"Description of Plot","pimage"=>"Property Image"
			);

$rules=array(
    		"propid"=>array("required"=>true),
			"pname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
			"did"=>array("required"=>true),
			"areano"=>array("required"=>true),
			"ta"=>array("required"=>true,"integeronly"=>true),
			"bedroom"=>array("required"=>true,"integeronly"=>true),
			"bathroom"=>array("required"=>true,"integeronly"=>true),
			"dimensions"=>array("required"=>true),
			"price"=>array("required"=>true,"integeronly"=>true),
			"pdesc"=>array("required"=>true,"minlength"=>3,"maxlength"=>250),
 			"pimage"=>array('filerequired'=>true),
     		);
    
    
$validator = new FormValidator($rules,$labels);
$rdate=date('Y-m-d',time());
if(isset($_POST["btn"]))
{
	if($validator->validate($_POST))
	{ 
		if($fileName=$file->doUploadRandom($_FILES['pimage'],array('.jpg','.png','.jpeg','.JPG','.PNG','.JPEG'),100000,5,'../uploads'))
		{ 
			$data=array(

						'propid'=>$_POST['propid'],
						'pname'=>$_POST['pname'],
						'did'=>$_POST['did'] ,
						'aid'=>$_POST['areano'],
						'ta'=>$_POST['ta'],
						'bedroom'=>$_POST['bedroom'],
						'bathroom'=>$_POST['bathroom'],
						'dimensions'=>$_POST['dimensions'],
						'price'=>$_POST['price'],
						'pdesc'=>$_POST['pdesc'],
						'pimage'=>$fileName,
						"pdate"=>$rdate,
						'status'=>'Wait',
						'pbstatus'=>'N',
						'srid'=>$sr
    				);
			
    		if($dao->insert($data,"property"))
    		{
        		echo "<script> alert('New record created successfully.....Wait for verification from ADMIN');</script> ";
				echo"<script >location.href = 'propertydetails.php'</script>"	;	
    		}
    		else
        	{	
				$msg="Failed to Enter Property Details";
			} 
?>

<span><?php echo $msg; ?></span>

<?php
		}
	else
		echo $file->errors();
	}
}
?>
<html>
<head>
<h1>ADD PROPERTY DETAILS</h1><br></br>
</head>
<body>

<form action="" method="POST" enctype="multipart/form-data">
<div class="row">
                    <div class="col-md-6">
Property Name:

<?= $form->textBox('pname',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('pname'); ?></span>

	</div>
</div>
 
<?php
					
						$start='<div class="form-group">';
						$end='</div>';
    
						 $district_options=$dao->ajaxCreateOptions('dname','did','district');
						
  						 $area_options=$dao->ajaxCreateOptions('aname','aid','area',1,'did');
					
						 $list=array(
							
							'did'=>array(array(),$district_options,'Select District'),
							
							'areano'=>array(array(),$area_options,'Select Area')
							
						);
						
						echo $form->ajaxDropDownList($list,$start,$end);
					?>
 
<div class="row">
                    <div class="col-md-6">
Property Type:

<?php
                    $options = $dao->createOptions('ptype','propid',"proptype");
                    echo $form->dropDownList('propid',array('class'=>'form-control'),$options);

?>
<span style="color:red;"><?= $validator->error('propid'); ?></span>

	</div>
</div>

<div class="row">
                    <div class="col-md-6">
Total Area of Plot (sq ft) :

<?= $form->textBox('ta',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('ta'); ?></span>

	</div>
</div>

<div class="row">
                    <div class="col-md-6">
No.of Bedrooms:

<?= $form->textBox('bedroom',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('bedroom'); ?></span>

	</div>
</div>	 
	 
<div class="row">
                    <div class="col-md-6">

No.of Bathroom						
<?= $form->textBox('bathroom',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('bathroom'); ?></span>

	</div>
</div>
	 

<div class="row">
                    <div class="col-md-6">
Dimensions(LxB):

<?= $form->textBox('dimensions',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('dimensions'); ?></span>

	</div>
</div>	 
	 
	 
<div class="row">
                    <div class="col-md-6">
Price of Plot:

<?= $form->textBox('price',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('price'); ?></span>

	</div>
</div>

<div class="row">
                    <div class="col-md-6">
Description:

<?= $form->textarea ('pdesc',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('pdesc'); ?></span>

	</div>
</div>

<div class="row">
                    <div class="col-md-6">
IMAGE of Property:

<?= $form->fileField('pimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('pimage'); ?></span>

	</div>
</div>
<br></br>

<button type="submit" name="btn">Submit</button>
	
</form>
</body>
</html>

<?php include('footer.php'); ?>