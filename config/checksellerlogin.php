<?php
function check_login()
{
if(strlen($_SESSION['susername'])==0)
	{	
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="./sellerlogin.php";		
		header("Location: http://$host$uri/$extra");
	}
}
?>