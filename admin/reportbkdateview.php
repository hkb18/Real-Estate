
<?php include("header.php");	?>
<?php require('../config/autoload.php'); 
include("dbcon.php");
?>

<?php
$dao=new DataAccess();
   $date1=$_SESSION['fdate'] ;
$date2=$_SESSION['tdate'] ;
   if(isset($_POST["property"]))
{
     header('location:index.php');
}

	   
	    ?>
       
       
       
       
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            
            <H1><center> Property Details </center> </H1>
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
                  		<th>Date of Booking</th>
  
                    </tr>
<?php
    
    $actions=array(
    
    
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('pid'),
		'images'=>array(
                        'field'=>'pimage',
                        'path'=>'../uploads/',
                        'attributes'=>array('style'=>'width:100px;'))
        
        
        
    );

   $condition="bkdate>='".$date1."' and bkdate<='".$date2."'";
   
   $join=array('area as a'=>array('a.aid=p.aid','join'),
		'district as d'=>array('d.did=p.did','join'),
		'proptype as pt'=>array('pt.propid=p.propid','join'),
       
    );  
	$fields=array('pid','pname','dname','aname','ptype','ta','bathroom','bedroom','dimensions','price','pdesc','pimage','bkdate');

    $users=$dao->selectAsTable($fields,'property as p',$condition,$join,$actions,$config);
    
    echo $users;
                                     
    ?>

             
                </table>
            </div>    


        
<form action="report.php" method="POST" enctype="multipart/form-data">

<button class="btn btn-success" type="submit"  name="purchase" >Report</button>


</form>
</div>

            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->


rptissuedatebetweenview.php
Displaying rptissuedatebetweenview.php.