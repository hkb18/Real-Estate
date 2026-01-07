<?php require('../config/autoload.php'); 
include('../config/checklogin.php');
	check_login();
$dao=new DataAccess();

?>
<!--	Header checking for logout 	-->

<?php
$b=$_SESSION['bid'];
if($b==0)
	include('header.php');
else
   include('buyerheader.php');	
 ?>
<!--	Header checking for logout ended	-->
<?php
	
$elements=array(
					"did"=>"","aid"=>""
			);

$form=new FormAssist($elements,$_POST);


$labels=array("did"=>"district","aid"=>"area");

$rules=array(
			"did"=>array("required"=>true),
			"aid"=>array("required"=>true),
		
	);

$validator = new FormValidator($rules,$labels);

if(isset($_POST["submit"]))
{
	if($validator->validate($_POST))
	{ 

	//	$_SESSION['did']=$_POST['did'];
	//	$did=$_SESSION['did'];
	//	echo $did;
		$_SESSION['aid']=$_POST['aid'];
		$aid=$_SESSION['aname'];
		echo $aid;
			echo"<script> location.replace('location.php'); </script>";
	}
}
	

///	if($dao->insert($data,"property"))
	//	{
	//	echo "<script> alert('Property found');</script> ";	  
//echo"<script >location.href = 'searchproperty.php'</script>";
	//	}
	//	else
  //      {
			//$msg="Page not found";
	//	} }
  ?>  
    
<html>
<head>
	<h1>SEARCH Location</h1>
</head>
<body>
	
	
		
			
			<form action="" method="POST" enctype="multipart/form-data" style="
    height: 260px">
Search by Location:
		
	<?php
					
						$start='<div class="form-group">';
						$end='</div>';
    
						$district_options=$dao->ajaxCreateOptions('dname','did','district');

						$area_options=$dao->ajaxCreateOptions('aname','aname','area',1,'did');
					
						$list=array(
							
							'did'=>array(array(),$district_options,'Select District'),
							
							'aid'=>array(array(),$area_options,'Select Area'),
							
						);
						
						echo $form->ajaxDropDownList($list,$start,$end);
					?>	
				
		<button type="submit" name="submit">Search Location</button>
		
	</form>
	</body>
</html>
<?php include('footer.php'); ?>