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
$dao=new DataAccess();
//$pid=$_SESSION['pid'];
//echo $pid;
?>

<br></br>
    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>      
                        <th>Reply ID</th>
                        <th>Enquiry Question ID</th>
                        <th>Reply from Admin</th>
                        <th>Seller ID</th>
                    </tr>
<?php
    
    $actions=array(
   // 'edit'=>array('label'=>'Enquiry','link'=>'senquiryqns.php','params'=>array('id'=>'pid'),'attributes'=>array('class'=>'btn btn-success')),
        );

    $config=array(
        //'srno'=>true,
      // 'hiddenfields'=>array('a_reid'),
		    );

   
   $join=array(
    		//'s_sendenquiry as s'=>array('s.s_seid=a.s_seid','join')	
            
		    );
				
	$condition="srid=$sr";
	  
	$fields=array('a_reid','s_seid','a_re','srid');

    $users=$dao->selectAsTable($fields,'a_replyenquiry as a',$condition);
    
    echo $users;
?>
             
                </table>
            </div>    
      
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
<br></br> <br></br>    
<?php include('footer.php'); ?>  