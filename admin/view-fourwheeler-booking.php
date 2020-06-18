<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  } else{

    if(isset($_POST['submit']))
  {
    
    $vid=$_GET['viewid'];
    $status=$_POST['status'];
   $remark=$_POST['remark'];
    $tcost=$_POST['cost'];
 
      $query.=mysqli_query($con, "update   bookingcar set TotalCost='$tcost', Status='$status' ,Remark='$remark' where ID='$vid'");
    if ($query) {
    echo '<script>alert("Transporta registracija bija atjaunota.")</script>';
    echo "<script>window.location.href ='all-fourwheeler-booking.php'</script>";
  }
  else
    {
      echo '<script>alert("Kluda. Pameginiet vel reiz!")</script>';
    }

  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin panele | Auto rezervacijas detalas</title>
    
   

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

            <h2 class="main-title-w3layouts mb-2 text-center">Apskatit pilnu infromaciju par rezervaciju</h2>
         
            <section class="tables-section">
   
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Auto rezervacija</h4>
                    <div class="container-fluid">
                        <div class="row">
                            
                                <?php
                               $vid=$_GET['viewid'];
$ret=mysqli_query($con,"select bookingcar.ID as bid,DATEDIFF(bookingcar.ReturnDate,bookingcar.BookingDate) as ddf, bookingcar.ID as bid,bookingcar.FullName,bookingcar.Email,bookingcar.MobileNumber,bookingcar.Location,bookingcar.BookingNumber,bookingcar.BookingDate,bookingcar.ReturnDate,bookingcar.Status,car.BrandName,car.VehicleName,car.RegistrationNumber,car.RentalPrice,car.VehicleModel,car.VehicleDescription,bookingcar.CreationDate from  bookingcar join  car on car.ID=bookingcar.VehicleID where bookingcar.ID='$vid' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <table border="1" class="table table-bordered">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Lietotaja detalas</td></tr>

    <tr>
    <th scope>Klients</th>
    <td><?php  echo $row['FullName'];?></td>
    <th scope>E-pasts</th>
    <td><?php  echo $row['Email'];?></td>
  </tr>
  <tr>
    <th scope>Tell. num.</th>
    <td><?php  echo $row['MobileNumber'];?></td>
    <th>Lokacija</th>
    <td><?php  echo $row['Location'];?></td>
  </tr>
    <tr>
    <th>Registracijas datums</th>
    <td colspan="2"><?php  echo $row['CreationDate'];?></td>
  </tr>
  <tr>
    <th>No</th>
    <td><?php  echo $row['BookingDate'];?></td>
    <th>Lidz</th>
    <td><?php  echo $row['ReturnDate'];?></td>
  </tr>
   <tr>
    <th>Nomas dienu skaits</th>
    <td><?php  echo $ddf=$row['ddf'];?></td>
    <th>Nomas cena</th>
    <td><?php  echo $rp=$row['RentalPrice'];?></td>
  </tr>
    <th>Kopiga summa</th>
    <td><?php  echo $tc=$ddf*$rp;?></td>
    <th>Trasnportas registracijas nr.</th>
    <td><?php  echo $row['BookingNumber'];?></td>
  </tr>
  <tr>
    <th>Brenda nosaukums</th>
    <td><?php  echo $row['BrandName'];?></td>
    <th>Transporta nosaukums</th>
    <td><?php  echo $row['VehicleName'];?></td>
  </tr>
  <tr>
    <th>Registracijas nr.</th>
    <td><?php  echo $row['RegistrationNumber'];?></td>
    <th>Transporta modele</th>
    <td><?php  echo $row['VehicleModel'];?></td>
  </tr>
  <tr>
    <th>Transporta informacija</th>
    <td colspan="3"><?php  echo $row['VehicleDescription'];?></td>
  </tr>
  <tr>
    <th>Pieprasijuma status</th>
    <td colspan="3"> 
<?php  $status=$row['Status'];  
if($row['Status']=="Approved")
{
  echo "Rezervacija apstiprinata";
}
if($row['Status']=="Unapproved")
{
 echo "Rezervacija atcelta";
}
if($row['Status']=="")
{
  echo "Rezervacija apstradas";
}
?></td>
  </tr>
<?php }?>
</table>
<?php  if($status!=''){
$ret=mysqli_query($con,"select * from bookingcar  where bookingcar.ID='$vid'");
$cnt=1;


 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="5" >Pieprasijuma vesture</th> 
  </tr>
  <tr>
    <th>Nr.</th>
<th>Kopiga summa</th>
<th>Papild</th>
<th>Status</th>
<th>Atbildes laiks</th>
</tr>
<?php  
while ($row=mysqli_fetch_array($ret)) { 
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row['TotalCost'];?></td> 
  <td><?php  echo $row['Remark'];?></td>
  <td><?php  echo $status=$row['Status'];?></td> 
   <td><?php  echo $row['RemarkDate'];?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
<?php } 
if ($status==""){
?> 
<p align="center">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Darbiba</button></p>  

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Rediget</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                 <form method="post" name="submit">

                                
                               
     <tr>
    <th>Papildus :</th>
    <td>
    <textarea name="remark" placeholder="Papild info" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>  
  <tr>
    <th>Kopiga summa :</th>
    <td>
    <input name="cost" value="<?php echo $tc?>" class="form-control wd-450" required="true" readonly></td>
  </tr>                         

  <tr>
    <th>Status :</th>
    <td>

   <select name="status" class="form-control wd-450" required="true" >
     <option value="Apstiprinats" selected="true">Apstiprinats</option>
     <option value="Atcelts">Atcelts</option>
   </select></td>
  </tr>
</table>
</div>
<div class="modal-footer">
 <button type="submit" name="submit" class="btn-view">Rediget</button>
  
  </form>

</div>

                      
                        </div>
                    </div>
                </div>
               

        

            </section>

          

           <?php include_once('includes/footer.php');?>
        </div>
    </div>



    <script src='js/jquery-2.2.3.min.js'></script>
 
    <script src="js/bootstrap.min.js"></script>
 
    <script src="js/sidebar-j.js"></script>
  
</body>

</html>
<?php }  ?>