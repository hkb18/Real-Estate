
<?php 



 require('../config/autoload.php'); 
include("header.php");


$elements=array(
        "fdate"=>"","tdate"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array("fdate"=>"from Date(mm/dd/yyyy)","tdate"=>"To Date(mm/dd/yyyy)" );

$rules=array(
    
    "fdate"=>array('required'=>true,'date'=>array('from'=>'-60 days 12 am','to'=>'today')),
    "tdate"=>array('required'=>true,'datecompare'=>array('comparewith'=>'fdate','operator'=>'>=')),
 

      
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_insert"]))
{
if($validator->validate($_POST))
{
 $_SESSION['fdate']=$_POST['fdate'];

$_SESSION['tdate']=$_POST['tdate'];

header('location:reportbkdateview.php');
       
}

}


?>
<html>
<head>
    <h1> BOOKED PROPERTY(S) OF LAST 60 DAYS</h1>
</head>
<body>

 <form action="" method="POST" >
 


<div class="row">
                    <div class="col-md-6">
From Date:
<?= $form->inputBox('fdate',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('fdate'); ?></span>


</div>
</div>


<div class="row">
                    <div class="col-md-6">
To Date:

<?= $form->inputBox('tdate',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('tdate'); ?></span>

</div>
</div>


<button type="submit" name="btn_insert"  >Submit</button>
</form>


</body>

</html>
