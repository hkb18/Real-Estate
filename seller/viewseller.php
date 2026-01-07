<?php require('../config/autoload.php'); include('../config/checksellerlogin.php');
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
$sr=$_SESSION['srid'];
?>
   
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
    
    $actions=array(
    //'edit'=>array('label'=>'Edit','link'=>'editseller.php','params'=>array('id'=>'srid'),'attributes'=>array('class'=>'btn btn-success')),  
    				);

    $config=array(
        //'srno'=>true,
        //'hiddenfields'=>array('srid'),
		'images'=>array(
                        'field'=>'sproof',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
                
    			);
   
	$condition= "status='Approved' and srid='$sr'";
								
   $join=array(
	   
    			);
	  
	$fields=array('sname','semail','susername','sphno','sgender','sproof');

    $users=$dao->selectAsTable($fields,'sellerreg as s',$condition,$join,$actions,$config);
    
    echo $users;

?>
             
                </table>
            </div>    
          
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
<br></br>
<br></br>
    <?php include('footer.php'); ?>