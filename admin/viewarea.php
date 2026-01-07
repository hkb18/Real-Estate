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
                        
                        <th>Area Id</th>
                        <th>District Name</th>
                        <th>Area Name</th>
                        <th>EDIT</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editarea.php','params'=>array('id'=>'aid'),'attributes'=>array('class'=>'btn btn-success')),
    
   
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('aid')
        
        
    );

   
   $join=array(
        
		'district as d'=>array('d.did=a.did','join')
    );  
	$fields=array('aid','dname','aname');

    $users=$dao->selectAsTable($fields,'area as a',1,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
