
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
     'edit'=>array('label'=>'Approve','link'=>'approvebuyer.php','params'=>array('id'=>'bid'),'attributes'=>array('class'=>'btn btn-success')),
    'delete'=>array('label'=>'Reject','link'=>'rejectbuyer.php','params'=>array('id'=>'bid'),'attributes'=>array('class'=>'btn btn-success'))
   
    
   
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('bid'),
		'images'=>array(
                        'field'=>'bproof',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
        
    );
$condition="bstatus='Wait'";
   
   $join=array(
        
		//'area as a'=>array('a.aid=p.aid','join'),
		//'district as d'=>array('d.did=p.did','join'),
		//'proptype as pt'=>array('pt.propid=p.propid','join'),
		//'propstatus as ps'=>array('ps.psid=p.psid','join')
    );
	  
	  $fields=array('bid','bname','bemail','busername','bphno','bgender','bproof');

    $users=$dao->selectAsTable($fields,'buyer as b',$condition,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
