<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a> 
            </div>
  
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">


<?php
require('../config/autoload.php');
//$_SESSION['email']=$_POST['email'];
//include('header.php');

$file=new FileUpload();

$elements=array(
        		"email"=>"", "spass"=>""
				);

$form=new FormAssist($elements,$_POST);

$dao=new DataAccess();

$labels=array(
				'email'=>"Email",'spass'=>"Password"
			);

$rules=array(
  				"email"=>array("required"=>true,"email"=>true),
   				"spass"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
			);


$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{

	if($_POST['email']=='admin@gmail.com' and $_POST['spass']=='admin')
	{
		echo "<script> alert('Successfully logged in');</script> ";
		header('location:header.php');
    }
    else
        {
			$msg="Invalid username or password "; ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
		}
}

?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">
 <H1><U>LOGIN FORM </U></H1>
 <div class="row">
                     <div class="col-md-6">
 Email:

 <?= $form->inputBox('email',array('class'=>'form-control')) ?>
 <span style="color:red;"><?= $validator->error('email'); ?></span>

 </div>
 </div>


 <div class="row">
                     <div class="col-md-6">
 Password:

 <?= $form->passwordbox('spass',array('class'=>'form-control')) ?>
 <span style="color:red;"><?= $validator->error('spass'); ?></span>

 </div>
 </div>


<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>
