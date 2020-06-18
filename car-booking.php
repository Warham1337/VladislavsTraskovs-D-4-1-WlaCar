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
    
    <title>Automasinu rezervacija </title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  
    <link href="assets/css/font-awesome.css" rel="stylesheet">

    <link href="style.css" rel="stylesheet">

    
</head>

<body id="body-car-booking">


   <?php include_once('includes/header.php');?>

   
    <div class="contact-page-wrao section-padding">
        <div class="container">
            <div class="contact-page-perent">
            <div class="row single-funfact" style="color:white">
                <div class="col-lg-14 m-auto">
                    <div class="contact-form">

                        <table border="1" class="table">
                            <h2>Manas rezervācijas</h2>
    <tr>
<th>#</th>
<th>Klients</th>
<th>Rezervacijas Numurs</th>   
<th>Rezervacijas Datums</th>
<th>Rezervacijas Status</th>
<th>Uzzinat plasak</th>
</tr>
        <?php 
                    $userid= $_SESSION['vrmsuid'];
 $query=mysqli_query($con,"select * from  bookingcar  where UserId='$userid'");
$cnt=1;
              while($row=mysqli_fetch_array($query))
              { ?>

<tr>
    <td><?php echo $cnt;?></td>
<td><?php echo $row['FullName'];?></td>
<td><?php echo $row['BookingNumber']?></td>
<td><?php echo $row['CreationDate']?></td>  
<td><?php $status=$row['Status'];
if($status==''){
 echo "Gaida apstiprinajumu";   
} else{
echo $status;
}

?>  
<td><a href="car-booking-details.php?bookingid=<?php echo $row['BookingNumber'];?>" class="btn theme-btn-dash">Detaļas</a></td>       
</tr>
<?php $cnt=$cnt+1; } ?>
</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


   
   <?php include_once('includes/footer.php');?>
 
</body>

</html>
<?php }  ?>