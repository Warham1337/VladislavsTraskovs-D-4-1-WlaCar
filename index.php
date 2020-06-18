<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="lv">

<head>
    

    <title>Majas lapa</title>


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="assets/css/font-awesome.css" rel="stylesheet">
   
    <link href="style.css" rel="stylesheet">
  
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">


</head>

<body>

    <?php include_once('includes/header.php');?>

    <section id="hat-index" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hat-title  text-center">
                        <h2>WlaCar</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="choose-car" class="section-padding">
        <div class="container">
            <div class="row">
           
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Jaunas automašīnas</h2>
                    </div>
                </div>
            
            </div>

            <div class="row">
          
                <div class="col-lg-12">
                    <div class="choose-content-wrap">
                   
                        <div class="tab-content" id="myTabContent">
                     

                            <div class="tab-pane fade show active" id="popular_cars" role="tabpanel" aria-labelledby="home-tab">
                             
                                <div class="popular-cars-wrap">
                           
                                    <div class="row popular-car-gird" style="padding-top: 20px">
                                        <?php
                                $query=mysqli_query($con,"select * from car order by rand() limit 6");
 while ($row=mysqli_fetch_array($query)) {


 ?>
                                        <div class="col-lg-4 col-md-6 con suv mpv">

                                            <div class="single-popular-car">
                                                <div class="p-car-thumbnails">
                                                    <a class="car-hover"  href="admin/images/<?php echo $row['Image'];?>">
                                                      <img src="admin/images/<?php echo $row['Image'];?>" width="100%" height='198px'>
                                                   </a>
                                                </div>

                                                <div class="p-car-content">
                                                    <h3>
                                                        <a href="single-car-details.php?viewid=<?php echo $row['ID'];?>"><?php echo $row['BrandName'];?> <?php echo $row['VehicleName'];?></a>
                                                        <span class="price"><?php echo $row['RentalPrice'];?>€ /diena</span>
                                                    </h3>

                                                    <h5><?php echo substr($row['VehicleDescription'],0,100);?></h5>

                                                    <div class="p-car-feature">
                                                        <ul class="car-info-list">
<li>Vietas: <?php echo $row['SeatingCapacity'];?></li>
<li>Degviela: <?php echo $row['Fuel'];?></li>
 
                                                </ul>
                                                <a href="single-car-details.php?viewid=<?php echo $row['ID'];?>" class="rent-btn">Papildus informacija</a>
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
  
        <section id="funfact-area" class="overlay section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 col-md-12 m-auto">
                    <div class="funfact-content-wrap">
                        <div class="row">
                     
                            <div class="col-lg-4 col-md-6">
                                <div class="single-funfact">
                                    <div class="funfact-icon">
                                        <i class="fa fa-motorcycle"></i>
                                    </div>
                                    <div class="funfact-content">
                                        <?php $query1=mysqli_query($con,"Select * from moto");
$totaltwowheeler=mysqli_num_rows($query1);
?>
                                        <p><span class="counter"><?php echo $totaltwowheeler;?></span></p>
                                        <h4>Motocikli</h4>
                                    </div>
                                </div>
                            </div>
                       
                            <div class="col-lg-4 col-md-6">
                                <div class="single-funfact">
                                    <div class="funfact-icon">
                                        <i class="fa fa-car"></i>
                                    </div>
                                    <div class="funfact-content">
                                        <?php $query6=mysqli_query($con,"Select * from car");
$totalfw=mysqli_num_rows($query6);
?>
                                        <p><span class="counter"><?php echo $totalfw;?></span></p>
                                        <h4>Automasinas</h4>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-lg-4 col-md-6">
                                <div class="single-funfact">
                                    <div class="funfact-icon">
                                        <i class="fa fa-handshake-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="funfact-content">
                                        <?php $query3=mysqli_query($con,"Select * from brand");
$totbrand=mysqli_num_rows($query3);
?>
                                        <p><span class="counter"><?php echo $totbrand;?></span></p>
                                        <h4>Transporta brendi</h4>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  



   <?php include_once('includes/footer.php');?>
  

</body>

</html>