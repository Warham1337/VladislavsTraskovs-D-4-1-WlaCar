<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  } else{

?>

<!DOCTYPE html>
<html lang="lv">

<head>
    <title>Admin panele | Veiksmigas rez. auto </title>

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
 
    <link rel="stylesheet" href="css/style4.css">
 
    <link href="css/fontawesome-all.css" rel="stylesheet">
 
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

</head>

<body>
    <div class="wrapper">

   <?php include_once('includes/sidebar.php');?>

        <div id="content">

       <?php include_once('includes/header.php');?>


            <h2 class="main-title-w3layouts mb-2 text-center">Automašīnu Apstiprinātās Rezervācijas</h2>
          
            <section class="tables-section">
   

                <div class="outer-w3-agile mt-3">
                    <div class="container-fluid">
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nr.</th>
                                        <th scope="col">Klients</th>
                                        <th scope="col">Rezervācijas nr.</th>
                                        <th scope="col">Brends</th>
                                        <th scope="col">Rezervācijas datums</th>
                                        <th scope="col">Apskatīt</th>
                                    </tr>
                                </thead>
                                <?php
$ret=mysqli_query($con,"select bookingcar.ID as bid,bookingcar.FullName,bookingcar.BookingNumber,bookingcar.BookingDate,car.VehicleName,bookingcar.CreationDate from  bookingcar join  car on car.ID=bookingcar.VehicleID where bookingcar.Status='Approved'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <tbody>
                                    <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['FullName'];?></td>
                  <td><?php  echo $row['BookingNumber'];?></td>
                  <td><?php  echo $row['VehicleName'];?></td>
                  <td><?php  echo $row['CreationDate'];?></td>
                  <td><a href="view-fourwheeler-booking.php?viewid=<?php echo $row['bid'];?>">Apskatīt</a>
                </tr>
                <?php 
$cnt=$cnt+1;
}?> 
                                    
                                    
                                   
                                   
                                </tbody>
                            </table>
                           
                        </div>
                    </div>
                </div>
        

    

            </section>

       

           <?php include_once('includes/footer.php');?>
        </div>
    </div>



    <script src='js/jquery-2.2.3.min.js'></script>

    <script src="js/sidebar-j.js"></script>


</body>

</html>
<?php }  ?>