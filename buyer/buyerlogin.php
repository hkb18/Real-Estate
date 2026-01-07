<!DOCTYPE html>

<html lang="en">
	
<head>	
	<title>Login V17</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="login/text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
<?php require('../config/autoload.php'); 
	
	
$dao=new DataAccess();

$conn = mysqli_connect("localhost","root","","realestate");
	
$elements=array(
				"busername"=>"","bpassword"=>""
				);
	
$form=new FormAssist($elements,$_POST);
	
$rules=array(   
			'busername'=>array('required'=>true),
    		'bpassword'=>array('required'=>true),
			);
	
$validator=new FormValidator($rules);

if(isset($_POST['login']))
{
	
    if($validator->validate($_POST))
    {       
		$data=array(
					'busername'=>$_POST['busername'],'bpassword'=>$_POST['bpassword']
					);
		
        if($info=$dao->login($data,'buyer'))
        {
			$_SESSION['busername']=$info['busername'];
			$_SESSION['bid']=$info['bid'];
			$b=$_SESSION['bid'];
			$c=$_SESSION['busername'];
		
			$sql="select bstatus from buyer where bid='$b'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$bstatus=$row['bstatus'];

			if($bstatus=='Approved')
			{
   				echo"<script> location.replace('buyerindex.php'); </script>";
			}
			
			else if($bstatus=='Rejected')
				echo "<script> alert('Rejected user');</script> ";
			
			else
				echo "<script> alert('Login after sometime');</script> ";
 		}
        else
		{
            $msg="Invalid username or password";
			echo "<script> alert('Invalid username or password');</script> ";
        }
    }   
}


?>



	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-34">
						Account Login
					</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="text" name="busername" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="bpassword" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">						
						<button class="login100-form-btn" name="login" type="submit">
							Sign in
						</button>
					
						
					</div>

					

					<div class="w-full text-center">
						<a href="buyerreg.php" class="txt3">
							Buyer Registeration
						</a>
					</div>
                    <div class="w-full text-center">
						<a href="index.php" class="txt3">
							HOME
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('login/images/wallhaven-kw8vx1.jpg');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>