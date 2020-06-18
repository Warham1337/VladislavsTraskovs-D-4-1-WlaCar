<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
   
    <title>Motocikli</title>

  
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  
    <link href="assets/css/font-awesome.css" rel="stylesheet">
   
    <link href="style.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">



</head>

<body id="car-body">

   <?php include_once('includes/header.php');?>

    <section id="hat-moto-details" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hat-title  text-center">
                        <h2>Motocikli</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="car-list-content m-t-50">
                      
                        <?php


if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 6;
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM car";
$ret1=mysqli_query($con,"select COUNT(*) from  moto");
$total_rows = mysqli_fetch_array($ret1)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);                                                   
$query=mysqli_query($con,"select * from moto LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {


?>
      
                        <div class="single-car-wrap">
                      <div class="row">
 
                                <div class="col-lg-5">
                                    
                                        <img src="admin/images/<?php echo $row['Image'];?>" width="70%" height='230px'>
                                    
                                </div>
                               
                         <div class="col-lg-7">
                                    
                                    <div class="display-table">
                                        <div class="display-table-cell">
                                            <div class="car-list-info">
                                                <h2><a href="single-bike-details.php?viewid=<?php echo $row['ID'];?>"><?php echo $row['VehicleName'];?></a></h2>
 <p><?php echo substr($row['VehicleDescription'],0,200);?> </p>
                                                <p class="car-price">
                                                    <?php echo $row['RentalPrice'];?>€ /dienā
                                                </p>
                                                <a href="single-bike-details.php?viewid=<?php echo $row['ID'];?>" class="uzzinat-vairak">Uzzināt vairāk</a>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                             
                            </div>
                        </div>
                         <?php } ?>
                     

              
                    <div class="page-pagi" align="center">
                        <nav aria-label="Page navigation example">
                         
                             <ul class="pagination" >
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><strong style="padding-left: 10px">Iepriekšējie</strong></a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><strong style="padding-left: 10px">Nākamie</strong></a>
        </li>
    </ul>
                        </nav>
                    </div>
             
                </div>
         
            </div>
        </div>
    </section>
  

   <?php include_once('includes/footer.php');?>


</body>

</html>