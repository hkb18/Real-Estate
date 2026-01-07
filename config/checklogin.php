<?php
function check_login()
{
if(strlen($_SESSION['busername'])==0)
	{	
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="./buyerlogin.php";		
		header("Location: http://$host$uri/$extra");
	}
}
?>