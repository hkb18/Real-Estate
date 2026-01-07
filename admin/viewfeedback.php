<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Fid</th>
                        <th>Feedback</th>
                      
                      
                    </tr>
<?php
    
    $actions=array(
      
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('fid'),
		
        
    );

		 $join=array(
	   
    			);		
   
  
	  
	  $fields=array('fid','fb');

    $users=$dao->selectAsTable($fields,'feedback as f',1,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
