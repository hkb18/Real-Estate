<?php 

 require('../config/autoload.php'); 
	include("header.php");
	include("dbcon.php");

$elements=array("s_se"=>"","a_re"=>"");

$form=new FormAssist($elements,$_POST);




//$conn = mysqli_connect("localhost", "root", "", "realestate");

$id=$_GET['id'];  //s_seid

/*$_SESSION['pid']=$info['pid'];
$p=$_SESSION['pid'];

echo $pid;*/
//$sql="update s_sendenquiry set estatus='2' where seid=".$id;
//$conn->query($sql);
//echo $sql;

$s=$_SESSION['sname'];

$dao=new DataAccess();
//$se=$_SESSION['s_seid'];
//$_SESSION['s_seid']=$info['s_seid'];
//$se=$_SESSION['s_seid'];
$labels=array(	
				"s_se"=>"Question","a_re"=>"Reply"
			);

$rules=array(
				"s_se"=>array("required"=>true),
				"a_re"=>array("minlength"=>3)
			);

$validator = new FormValidator($rules,$labels);

	
	if(isset($_POST["btn"]))
	{  
		if($validator->validate($_POST))
		{  

			$data=array(
					's_seid'=>$_POST['s_se'],
					'a_re'=>$_POST['a_re'],
					'srid'=>$id
					//'pid'=>$p
				//	'estatus'=>'2'
				);
		

 			if($dao->insert($data,"a_replyenquiry"))
    		{
				$sql= "update s_sendenquiry set estatus='2' where s_seid=$id";
$conn->query($sql);
echo $sql;
echo $s;
//$sql1="insert into a_replyenquiry(pid) values ($pid) ";
//$conn->query($sql1);
//echo $sql1		;



        		echo "<script> alert('Reply send successfully');</script> ";
			//	header('location:viewenquiry.php');
				echo"<script> location.replace('viewenquiry.php'); </script>";
				
			}
    		else
			{
				$msg="failed";
			
		
?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
			}
}


}


?>
<html>
<head>
<h1>REPLY ENQUIRY</h1>
</head>
<body>

 <form action="" method="POST" >
 
 <div class="row">
                    <div class="col-md-6">

 
 Question:

<?php
                    $options = $dao->createOptions('s_se','s_seid',"s_sendenquiry");
                    echo $form->dropDownList('s_se',array('class'=>'form-control'),$options);

?>
<span style="color:red;"><?= $validator->error('s_se'); ?></span>
</div>
</div>   

<div class="row">
                    <div class="col-md-6">
Reply:

<?= $form->textarea('a_re',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('a_re'); ?></span>

</div>
</div>                  
<button type="submit" name="btn">Submit</button>
</form>


</body>

</html>


