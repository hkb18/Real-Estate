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
                        
                        <th>BId</th>
                        <th>Feedback</th>
                      
                      
                    </tr>
<?php
    
    $actions=array(
   // 'edit'=>array('label'=>'Approve','link'=>'approveproperty.php','params'=>array('id'=>'pid'),'attributes'=>array('class'=>'btn btn-success')),
    //'delete'=>array('label'=>'Reject','link'=>'rejectproperty.php','params'=>array('id'=>'pid'),'attributes'=>array('class'=>'btn btn-success'))
   
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('bid'),
		
        
    );

					//$condition="status='Wait'";
   
  
	  
	  $fields=array('bid','bf');

    $users=$dao->selectAsTable($fields,'bfeedback as b',$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
