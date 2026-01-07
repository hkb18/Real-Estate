<?php 
require('../config/autoload.php'); 
include('../config/checklogin.php');
check_login();

$dao=new DataAccess();

$aid=$_SESSION['aid'];
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

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>    
                        <th>Property Id</th>
                        <th>Property Name</th>
                        <th>District Name</th>
                        <th>Area Name</th>
                        <th>Property Type</th>
                        <th>Total Area of Plot</th>
						<th>Bathroom</th>
						<th>Bedroom</th>
						<th>Dimension</th>
                        <th>Price of Plot</th>
                        <th>Description</th>
                        <th>Image of Property</th>
                        <th>Book</th>
                    </tr>
<?php
    
    $actions=array(
					'edit'=>array('label'=>'Book','link'=>'book1.php','params'=>array('id'=>'pid'),'attributes'=>array('class'=>'btn btn-success')),
				);

    $config=array(
     //   'srno'=>true,
       // 'hiddenfields'=>array('pid'),
		'images'=>array(
                        'field'=>'pimage',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
        
    );

$condition=" aname='$aid' and status='Approved' and pbstatus='N'";
					    
				
   
   $join=array(
        
		'area as a'=>array('a.aid=p.aid','join'),
		'district as d'=>array('d.did=p.did','join'),
		'proptype as pt'=>array('pt.propid=p.propid','join'),
		
    );
	  
$fields=array('pid','pname','dname','aname','ptype','ta','bathroom','bedroom','dimensions','price','pdesc','pimage');

$users=$dao->selectAsTable($fields,'property as p',$condition,$join,$actions,$config);
    
echo $users;                   
    
?>
             
                </table>
            </div>    

        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
<?php include('footer.php'); ?>    
