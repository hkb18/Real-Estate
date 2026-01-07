
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
                       <h3> REPORT OF REGISTERED BUYERS</h3>
 <th>BId</th>
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
        'srno'=>true,
        'hiddenfields'=>array('bid'),
		'images'=>array(
                        'field'=>'bproof',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
       
    );
$condition="bstatus='Approved'";
   
$join=array();
	  
$fields=array('bid','bname','bemail','busername','bphno','bgender','bproof');

$users=$dao->selectAsTable($fields,'buyer as b',$condition,$join,$actions,$config);
    
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
        

