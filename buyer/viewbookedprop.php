<?php require('../config/autoload.php');
		include('../config/checklogin.php');
	check_login();?>

<?php
$dao=new DataAccess();

$b=$_SESSION['bid'];
$_SESSION['pid']=$info['pid'];
$p=$_SESSION['pid']

 ?>
<!--	Header checking for logout 	-->

<?php
if($b==0)
	include('header.php');
else
   include('buyerheader.php');	
 ?>
<!--	Header checking for logout ended	-->
    	<br></br>
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                       
			<th> PROPERTY NAME</th>
						<th>type</th>
						<th>price</th>
			<th>DISTRICT NAME</th>
			<th>AREA NAME</th>
			<th>SELLER NAME</th>
			<th>SELLER PHNO</th>
			<th>SELLER Email</th>
			
			<th>BOOKING DATE</th>
			<th>IMAGE</th>			
                        <th>Cancel</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    //'edit'=>array('label'=>'Print','link'=>'print2.php','params'=>array('id'=>'pid'),'attributes'=>array('class'=>'btn btn-success')),
    
     'delete'=>array('label'=>'Cancel','link'=>'cancel1.php','params'=>array('id'=>'pid'),'attributes'=>array('class'=>'btn btn-success')),
    
    );

    $config=array(
   //     'srno'=>true,
     //   'hiddenfields'=>array('pid'),
		'images'=>array(
                        'field'=>'pimage',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
    );

   
   $join=array(
        'sellerreg as s'=>array('s.srid=p.srid','join'),
		'area as a'=>array('a.aid=p.aid','join'),
		'district as d'=>array('d.did=p.did','join'),
		'proptype as pt'=>array('pt.propid=p.propid','join'),
        
		
    );
					$condition= "bid=$b and pbstatus='B'";
	  
	  $fields=array('pname','ptype','price','dname','aname','sname','sphno','semail','bkdate','pimage');

    $users=$dao->selectAsTable($fields,'property as p',$condition,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    
		
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    	<br></br>	<br></br>
<?php include('footer.php'); ?>    