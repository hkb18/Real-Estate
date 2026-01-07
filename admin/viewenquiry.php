<?php require('../config/autoload.php'); 


$dao=new DataAccess();
session_start();

$_SESSION['pid']=$info['pid'];
$p=$_SESSION['pid'];
 include('header.php');

 $_SESSION['sname']=$info['sname'];
 $s=$_SESSION['sname'];
 echo $s;

//$_SESSION['s_seid']=$info['s_seid'];
//$se=$_SESSION['s_seid'];
    ?>
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>SEID</th>
                        <th>ENQUIRY QUESTION</th>
                        <th>SELLER NAME</th>
                        <th>PID</th>
                       <th>VIEW PROPERTY / REPLY</th>
                        
                     
                      
                    </tr>
<?php

					
	$actions=array(
		'delete'=>array('label'=>'View','link'=>'viewrejectprop.php','params'=>array('id'=>'pid'),'attributes'=>array('class'=>'btn btn-success')),
		
		'edit'=>array('label'=>'Reply','link'=>'areplyenquiry.php','params'=>array('id'=>'s_seid'),'attributes'=>array('class'=>'btn btn-success'))
				
					);

    $config=array(
        //'srno'=>true,
        //'hiddenfields'=>array('s_seid')
		
        
    );

					
   
   $join=array(
        
		//'sellerreg as s'=>array('s.srid=se.srid','join'),
		
		'sellerreg as s'=>array('s.srid=se.srid','join'),
		
    );
		$condition="estatus='1'";
	  
	  $fields=array('s_seid','s_se','sname','pid');

     

    $users=$dao->selectAsTable($fields,'s_sendenquiry as se',$condition,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

      

            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
