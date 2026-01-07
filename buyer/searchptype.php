<?php
require('../config/autoload.php'); 
include('../config/checklogin.php');
check_login();

$dao=new DataAccess();
?>
<!--	Header checking for logout 	-->

<?php
//style="height: 240px" FORM
$b=$_SESSION['bid'];
if($b==0)
	include('header.php');
else
   include('buyerheader.php');	
 ?>
<!--	Header checking for logout ended	-->
<?php
	
$elements=array("propid"=>"");

$form=new FormAssist($elements,$_POST);

$labels=array("propid"=>"Property Type");

$rules=array("propid"=>array("required"=>true));

$validator = new FormValidator($rules,$labels);

if(isset($_POST["submit"]))
{
	if($validator->validate($_POST))
	{ 
		$_SESSION['propid']=$_POST['propid'];
		
		$propid=$_SESSION['ptype']	;
		
		echo"<script> location.replace('ptype.php'); </script>";
		
	}
}
	
?>  
    
<html>
<head>
<h1>SEARCH Property Type</h1>
	<br></br>
</head>
<body>
	
	<form action="" method="POST" enctype="multipart/form-data">

<div class="row">
                    <div class="col-md-6">
Search by Property Type:

<?php
                    $options = $dao->createOptions('ptype','ptype',"proptype");
                    echo $form->dropDownList('propid',array('class'=>'form-control'),$options);

?>
						</div>
		</div>
<span style="color:red;"><?= $validator->error('propid'); ?></span>	
		<br></br>
						<button type="submit" name="submit">Search Type</button>
	

</form>						
</body>						
</html>	
<br></br> <br></br>
	<?php include('footer.php'); ?>