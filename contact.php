<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="lv">

<head>
    
    <title>Vehicle Rental Management System - Contact Us</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/font-awesome.css" rel="stylesheet">

    <link href="style.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,900&display=swap" rel="stylesheet">


 
</head>

<body id="body-contact">

   <?php include_once('includes/header.php');?>

    <section id="hat-contact">
        <div class="container">
            <div class="row">
              
                <div class="col-lg-12">
                    <div class="hat-title  text-center">
                        <h2 class="kontakti-nosaukums">Mūsu kontakti</h2>
                    </div>
                </div>
           
            </div>
        </div>
    </section>
 

        <?php 
 $query=mysqli_query($con,"select * from  info where PageType='contactus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
        <div class="container-contact">
                        <div class="box-contact">
                            <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <div class="content-contact">
                                <h3>Adress:<br> <?php  echo $row['PageDescription'];?></h3>
                            </div>
                        </div>
                        <div class="box-contact">
                            <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                            <div class="content-contact aligncenter">
                                <h3>E-pasts:  <?php  echo $row['Email'];?></h3>
                            </div>
                        </div>
                        <div class="box-contact">
                            <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                            <div class="content-contact">
                                <h3>Tellefona numurs:  +<?php  echo $row['MobileNumber'];?> </h3>
                            </div>
                        </div>
        
                    </div>
                    <?php } ?>
  

  <?php include_once('includes/footer.php');?>



</body>

</html>