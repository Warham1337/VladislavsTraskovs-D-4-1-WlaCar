<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vrmsuid']==0)) {
  header('location:logout.php');
  } else{

  
?>
<!DOCTYPE html>
<html class="no-js" lang="lv">

<head>
    
    <title>Motociklu rezervacijas detalas</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  
    <link href="assets/css/font-awesome.css" rel="stylesheet">
   
    <link href="style.css" rel="stylesheet">

</head>

<body>

   <?php include_once('includes/header.php');?>


    <div class="contact-page-wrao section-padding "style="padding-top: 200px">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="contact-form">
<b>#<?php echo $bid=$_GET['bookingid'];?> Rezervācijas Detaļas</b>



 <div class="row">
 <div class="col-lg-12">
<?php

    $link = "http"; 
    $link .= "://"; 
    $link .= $_SERVER['HTTP_HOST']; 

$userid= $_SESSION['vrmsuid'];
$ret=mysqli_query($con,"select CreationDate,Status from bookingmoto where UserId='$userid' and BookingNumber='$bid'");
while($result=mysqli_fetch_array($ret)) {
?>

<p style="color:#000"><b>Rezervacijas nr #</b><?php echo $bid?></p>
<p style="color:#000"><b>Rezervacijas datums : </b><?php echo $od=$result['CreationDate'];?></p>
<p style="color:#000"><b>Rezervacijas status :</b> <?php if($result['Status']==""){
    echo "Pieteikums vēl nav pārbaudīts";
} else {
echo $result['Status'];
}?> &nbsp;
</p>

<?php } ?>

<p>
 
 </div>
 </div> 

            <div class="row" style="margin-top:1%">
 <div class="col-lg-12">

        <?php 
 $query=mysqli_query($con,"select DATEDIFF(bookingmoto.ReturnDate,bookingmoto.BookingDate) as ddf,moto.Image,moto.VehicleName,moto.RentalPrice,bookingmoto.FullName,bookingmoto.BookingNumber,bookingmoto.BookingDate,bookingmoto.ReturnDate,bookingmoto.TotalCost,bookingmoto.Remark,bookingmoto.Status,bookingmoto.RemarkDate,bookingmoto.CreationDate from moto join bookingmoto on moto.ID=bookingmoto.VehicleID where bookingmoto.Userid='$userid' and bookingmoto.BookingNumber=$bid");
$num=mysqli_num_rows($query);
if($num>0){
    $cnt=1;

?>
<table border="1" class="table">
    <tr>
<th>#</th>
<th>Rezervacijas numurs</th>
<th>Rezervacijas datums</th>
<th>Rezervacijas sakums</th>
<th>Rezervacijas beigas</th>
<th>Transporta bilde</th>  
<th>Transporta nosaukums</th>    
<th>Nomas cena</th>   
<th>Kopiga cena</th>  

</tr>
<?php   
while ($row=mysqli_fetch_array($query)) {
    ?>



<tr>
<td><?php echo $cnt;?></td>
<td><?php echo $row['BookingNumber'];?></td>
<td><?php echo $row['CreationDate'];?></td>
<td><?php echo $row['BookingDate'];?></td>
<td><?php echo $row['ReturnDate'];?></td>
<td>
<img class="b-goods-f__img img-scale" src="admin/images/<?php echo $row['Image'];?>" alt="<?php echo $row['Image'];?>" width='300' height='250'></td>
<td><?php echo $row['VehicleName'];?></td>  
<td><?php echo $rpice=$row['RentalPrice'];?>  </td> 
<td>Rs. <?php
$d1=$row['ddf'];;

 echo $total=$d1*$rpice;?></td>
 <?php 

$cnt=$cnt+1; 
                    }        
 ?> 
</td>
    
</tr>
<?php } ?>

</table>

<p>


 
    <p style="color:red">
        <a href="bike-booking.php" title="Back" style="color:black">Atpakaļ</a>
    </p>


                </div>
            </div>         </div>
                </div>
            </div>
        </div>
    </div>
 

   
   <?php include_once('includes/footer.php');?>

</body>

</html>
<?php }  ?>