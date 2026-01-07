<?php
require('../config/autoload.php'); 
include('../config/checklogin.php');
check_login();

$b=$_SESSION['bid'];	

$dao=new DataAccess();
?>

<!--	Header checking for logout 	-->

<?php
if($b==0)
	include('header.php');
else
   include('buyerheader.php');	
 ?>
<!--	Header checking for logout ended	-->
    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>   
                       
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Proof</th>   
                    </tr>
<?php
    
    $actions=array();

    $config=array(
      //  'srno'=>true,
      //  'hiddenfields'=>array('bid'),
		'images'=>array(
                        'field'=>'bproof',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
       
				);
	$condition="bstatus='Approved' and bid=$b";
   
	$join=array();
	  
$fields=array('bname','bemail','busername','bphno','bgender','bproof');

$users=$dao->selectAsTable($fields,'buyer as b',$condition,$join,$actions,$config);
    
echo $users;
   
?>
             
                </table>
            </div>                
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
<br></br> <br></br> 
<?php include('footer.php'); ?>