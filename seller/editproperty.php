<?php require('../config/autoload.php');
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
$dao=new DataAccess();
//$sql="select pid from property where status='Approved' ";  last min change
//$result = $conn->query($sql);
//$row = $result->fetch_assoc();
//$sym=$row['sympid'];
 $info=$dao->getData('*','property','pid='.$_GET['id']);


$file=new FileUpload();

$elements=array(
        "pname"=>$info[0]['pname'],
		//"did"=>$info[0]['did'],
//		"aid"=>$info[0]['aid'],
//		"propid"=>$info[0]['propid'],
		//"psid"=>$info[0]['psid'],
		"ta"=>$info[0]['ta'],
		
		'bedroom'=>$info[0]['bedroom'],
		'bathroom'=>$info[0]['bathroom'],
		'dimensions'=>$info[0]['dimensions'],
		"price"=>$info[0]['price'],
		"pdesc"=>$info[0]['pdesc'],
//		"pimage"=>$info[0]['pimage']
		);

	$form = new FormAssist($elements,$_POST);

$labels=array("pname"=>"Property Name","ta"=>"Total size of plot","bedroom"=>"Total no.of bedroom","bathroom"=>"Total no.of bathroom","dimensions"=>"Dimension (Length x Breadth) of property","price"=>"Price of Plot","pdesc"=>"Description of Plot"
				);

$rules=array(
//    "propid"=>array("required"=>true),
	"pname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
//	"did"=>array("required"=>true),
//	"areano"=>array("required"=>true),
	"ta"=>array("required"=>true,"integeronly"=>true),
	"bedroom"=>array("required"=>true,"integeronly"=>true),
	"bathroom"=>array("required"=>true,"integeronly"=>true),
	"dimensions"=>array("required"=>true),
	"price"=>array("required"=>true,"integeronly"=>true),
	"pdesc"=>array("required"=>true,"minlength"=>3,"maxlength"=>250),
 //	"pimage"=>array('filerequired'=>true),
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{


			//if($fileName=$file->doUploadRandom($_FILES['pimage'],array('.jpg','.png','.jpeg','.JPG','.PNG','.JPEG'),100000,5,'../uploads'))
			
$data=array(
//		'propid'=>$_POST['propid'],
		'pname'=>$_POST['pname'],
		//'psid'=>$_POST['psid'],
//		'did'=>$_POST['did'] ,
//		'aid'=>$_POST['aid'],
		'ta'=>$_POST['ta'],
		'bedroom'=>$_POST['bedroom'],
		'bathroom'=>$_POST['bathroom'],
		'dimensions'=>$_POST['dimensions'],		
		'price'=>$_POST['price'],
		'pdesc'=>$_POST['pdesc'],
		
		
//        'pimage'=>$fileName,
    );
  $condition='pid='.$_GET['id'];
//if(isset($flag))
			//{	$data['pimage']=$fileName;
		
			//}
    

    if($dao->update($data,'property',$condition))
    {
        $msg="Successfullly Updated";
		echo"<script >location.href = 'viewproperty.php'</script>"	;
//	header('location:viewproperty.php');
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

<form action="" method="POST" enctype="multipart/form-data">
<div class="row">
                    <div class="col-md-6">
Property Name:

<?= $form->textBox('pname',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('pname'); ?></span>

</div>
</div>
 
 
<?php
		/*			
						$start='<div class="form-group">';
						$end='</div>';
    
						 $district_options=$dao->ajaxCreateOptions('dname','did','district');
						
                        
						 $area_options=$dao->ajaxCreateOptions('aname','aid','area',1,'did');
					
						$list=array(
							
							'did'=>array(array(),$district_options,'Select District'),
							
							'aid'=>array(array(),$area_options,'Select Area'),
							
						);
						
						echo $form->ajaxDropDownList($list,$start,$end);*/
					?>
 <!--
 
<div class="row">
                    <div class="col-md-6">
<!--Property Type:

<?php//
     //               $options = $dao->createOptions('ptype','propid',"proptype");
     //               echo $form->dropDownList('propid',array('class'=>'form-control'),$options);

?>
<span style="color:red;"><?//= $validator->error('propid'); ?></span>

</div>
</div>
					-->

<?php
           //         $options = $dao->createOptions('pstatus','psid',"propstatus");
             //       echo $form->dropDownList('psid',array('class'=>'form-control'),$options);

?>




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
<!--
<div class="row">
                    <div class="col-md-6">
IMAGE of Property:

<?//= $form->fileField('pimage',array('class'=>'form-control')); ?>


</div>
</div>

					-->

<button type="submit" name="btn_update" id="btn_update">UPDATE</button>
</form>

</body>
</html>

<?php include('footer.php'); ?>