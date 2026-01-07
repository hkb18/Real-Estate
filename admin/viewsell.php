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
                        
                        <th>SRId</th>
                        <th> Name</th>
                        
                        <th>Email</th>
                        <th>Username</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Proof</th>
                        <th>APPROVE/REJECT</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
     'edit'=>array('label'=>'Approve','link'=>'approveseller.php','params'=>array('id'=>'srid'),'attributes'=>array('class'=>'btn btn-success')),
    'delete'=>array('label'=>'Reject','link'=>'rejectseller.php','params'=>array('id'=>'srid'),'attributes'=>array('class'=>'btn btn-success'))
   
    
   
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('srid'),
		'images'=>array(
                        'field'=>'sproof',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
        
    );
$condition="status='Wait'";
   
   $join=array(
        
		//'area as a'=>array('a.aid=p.aid','join'),
		//'district as d'=>array('d.did=p.did','join'),
		//'proptype as pt'=>array('pt.propid=p.propid','join'),
		//'propstatus as ps'=>array('ps.psid=p.psid','join')
    );
	  
	  $fields=array('srid','sname','semail','susername','sphno','sgender','sproof');

    $users=$dao->selectAsTable($fields,'sellerreg as s',$condition,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
