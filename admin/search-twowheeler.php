<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  } else{

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin panele | Meklet moto</title>
    
   
 
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

           
            <h2 class="main-title-w3layouts mb-2 text-center">Meklēt Moto Rezervāciju</h2>
        
            <section class="tables-section">
   

                <div class="outer-w3-agile mt-3">
                    <form name="search" method="post" >
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Meklēt rezervāciju pec:</h4>
                                   
                                       <div class="form-group row">
                                                        <label class="col-4 col-form-label" for="example-email">Klienta vārda / rezervācijas nr.</label>
                                                        <div class="col-6">
                                                            <input id="searchdata" type="text" name="searchdata" required="true" class="form-control">
                                                        </div>
                                                    </div> 

                                                    <div class="form-group row">
                                                                                                                <div class="col-10">
<p style="text-align: center;"><button type="submit" name="search" class="btn btn-info btn-min-width mr-1 mb-1">Meklēt</button></p>
                                                        </div>
                                                    </div> 
                                    
       </form>
       <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Meklēšana pec "<?php echo $sdata;?>" atslēgas vārda </h4>
                    <div class="container-fluid">
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nr.</th>
                                        <th scope="col">Klients</th>
                                        <th scope="col">Rezervācijas nr.</th>
                                        <th scope="col">Modele</th>
                                        <th scope="col">Rezervācijas datums</th>
                                        <th scope="col">Darbiba</th>
                                    </tr>
                                </thead>
                                <?php
$ret=mysqli_query($con,"select bookingmoto.ID as bid,bookingmoto.FullName,bookingmoto.BookingNumber,bookingmoto.BookingDate,moto.VehicleName,bookingmoto.CreationDate from  bookingmoto join  moto on moto.ID=bookingmoto.VehicleID where bookingmoto.FullName like '%$sdata%' ||bookingmoto.BookingNumber like '%$sdata%'");
$num=mysqli_num_rows($ret);
if($num>0){
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
                  <td><a href="view-twowheeler-booking.php?viewid=<?php echo $row['bid'];?>">Rezervācijas detaļas</a>
                </tr>
                <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> Nav atrasta. Mēģiniet vēlreiz!</td>

  </tr>
   
<?php } }?>

                                    
                                    
                                   
                                   
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



</html>
<?php }  ?>