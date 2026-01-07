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
                        
                        <th>Property Type Id</th>
                        <th>Property Type</th>
                        <th>EDIT</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editpropertytype.php','params'=>array('id'=>'propid'),'attributes'=>array('class'=>'btn btn-success')),
    
   
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('propid')
        
        
    );

   
   $join=array(
        //'dept as dt'=>array('dt.dno=s.dno','join'),
    );  $fields=array('propid','ptype');

    $users=$dao->selectAsTable($fields,'proptype as t',1,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
