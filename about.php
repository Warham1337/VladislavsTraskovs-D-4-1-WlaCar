<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="lv">

<head>
   
    <title>Par mums</title>

   
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"> 
 
    <link href="assets/css/font-awesome.css" rel="stylesheet">
  
    <link href="style.css" rel="stylesheet">
    
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">




</head>

<body id="body-aboutus">
<?php include_once('includes/header.php');?>

    <section id="hat-aboutus" class="section-padding">
        <div class="container-aboutus">
            <div class="row">
            <?php 
 $query=mysqli_query($con,"select * from  info where PageType='aboutus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
                <div class="col-lg-12">
                    <div class="hat-title  text-center">
                        <h2><?php  echo $row['PageTitle'];?></h2>
                        <div class="text-center">
                        <div class="col-lg-15">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="about-content">
                                <p><?php  echo $row['PageDescription'];?></p>
                                <a href="car-list.php">
                                    <span></span>    
                                    <span></span>  
                                    <span></span>  
                                    <span></span>  
                                    Automašīnas
                                </a>
                                <a href="bike-list.php">
                                    <span></span>  
                                    <span></span>   
                                    <span></span>   
                                    <span></span>     
                                    Motocikli
                                </a>
                            
                            </div>  
                        </div>
                    </div>
                    
                </div>
                <?php } ?>
                </div>
                </div>
                </div>
            </div>
        </div>
        
    </section>


    <?php include_once('includes/footer.php');?>
</body>

</html>