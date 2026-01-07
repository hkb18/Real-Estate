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
 
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    <div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        
                        <th>Property Name</th>
                        <th>District Name</th>
                        <th>Area Name</th>
                        <th>Property Type</th>
                        <th>Total Area of Plot</th>
						<th>No.of Bathroom</th>
						<th>No.of Bedroom</th>
						<th>Dimension</th>
                        <th>Price of Plot</th>
                        <th>Description</th>
                        <th>Image of Property</th>
						<th>Property Status</th>
                        <th>Enquiry</th>
                    </tr>
<?php
    
    $actions=array(
    			'edit'=>array('label'=>'Enquiry','link'=>'senquiryqns.php','params'=>array('id'=>'pid'),'attributes'=>array('class'=>'btn btn-success')),
				);

    $config=array(
       // 'srno'=>true,
        //'hiddenfields'=>array('pid'),
		'images'=>array(
                        'field'=>'pimage',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))   
    			);

   
   $join=array(
       		'area as a'=>array('a.aid=p.aid','join'),
			'district as d'=>array('d.did=p.did','join'),
			'proptype as pt'=>array('pt.propid=p.propid','join'),
	    	);
					
	$condition= "status='Rejected' and srid=$sr";
	  
	$fields=array('pname','dname','aname','ptype','ta','bathroom','bedroom','dimensions','price','pdesc','pimage','status');

    $users=$dao->selectAsTable($fields,'property as p',$condition,$join,$actions,$config);
    
    echo $users;
?>
             
                </table>
            </div>    
  
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
<br></br> <br></br>   
<?php include('footer.php'); ?> 