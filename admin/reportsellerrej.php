
<?php include("header.php");	?>
<?php require('../config/autoload.php'); 
include("dbcon.php");
  $dao=new DataAccess();
	    ?>
       
       
       
       
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                       <h3> REPORT OF REJECTED SELLERS</h3>
                        <th>SRId</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Proof</th>
                       
                     
                      
                    </tr>
<?php
    
    $actions=array(
   
    );

    $config=array(
        //'srno'=>true,
        //'hiddenfields'=>array('srid'),
		'images'=>array(
                        'field'=>'sproof',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
        
    );

   
	$condition= "status='Rejected'";
					
					
   $join=array(
  
    );
	  
	  $fields=array('srid','sname','semail','susername','sphno','sgender','sproof');

    $users=$dao->selectAsTable($fields,'sellerreg as s',$condition,$join,$actions,$config);
    
    echo $users;
                     
                    
                   
    
?>
					</table>
             <form action="report.php" method="POST" enctype="multipart/form-data">

<button class="btn btn-success" type="submit"  name="purchase" >Report</button>


</form>
                
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
        

