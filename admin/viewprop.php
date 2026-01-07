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
                        
                        <th>PId</th>
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
                        <th>Approve/Reject</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Approve','link'=>'approveproperty.php','params'=>array('id'=>'pid'),'attributes'=>array('class'=>'btn btn-success')),
    'delete'=>array('label'=>'Reject','link'=>'rejectproperty.php','params'=>array('id'=>'pid'),'attributes'=>array('class'=>'btn btn-success'))
   
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('pid'),
		'images'=>array(
                        'field'=>'pimage',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
        
    );

					$condition="status='Wait'";
   
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
    
    
