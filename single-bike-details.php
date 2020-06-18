<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $userid=$_SESSION['vrmsuid'];
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $mobilenumber=$_POST['mobnum'];
    $location=$_POST['location'];
    $bdate=$_POST['bookingdate'];
    $rdate=$_POST['returndate'];
    $bookingnumber = mt_rand(100000000, 999999999);
$vid=$_GET['viewid'];

  $query2=mysqli_query($con,"SELECT * FROM `bookingmoto` where ('$bdate' BETWEEN date(BookingDate) and date(ReturnDate) || '$rdate' BETWEEN date(BookingDate) and date(ReturnDate) || date(BookingDate) BETWEEN '$bdate' and '$rdate') and VehicleID='$vid'");
$num=mysqli_num_rows($query2);
if($num==0){
    $query1=mysqli_query($con,"insert into  bookingmoto(VehicleID,Userid,FullName,Email,MobileNumber,Location,BookingDate,ReturnDate,BookingNumber) value('$vid','$userid','$fullname','$email','$mobilenumber','$location','$bdate','$rdate','$bookingnumber')");
        if ($query1) {
 echo '<script>alert("Jusu veiksmigi rezervejat motociklu! Jusu rezervacijas numurs ir "+"'.$bookingnumber.'")</script>';
echo "<script>window.location.href='bike-list.php'</script>";
  }
  else
    {
echo '<script>alert("Kluda. Pameginiet vel reiz.")</script>';
    }}
    else {
echo '<script>alert("Transports nav piejams tajas dieans")</script>';

}

  
}

?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    
    <title>Motocikli</title>


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/font-awesome.css" rel="stylesheet">
    
    <link href="style.css" rel="stylesheet">


</head>

<body>

  <?php include_once('includes/header.php');?>
    

    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <?php
 $cid=$_GET['viewid'];
$ret=mysqli_query($con,"select * from moto where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <div class="col-lg-8">
                    <div class="car-details-page">
                        <h2><strong><?php echo $row['VehicleName'];?></strong><span class="price">Cena: <b><?php echo $row['RentalPrice'];?>€ /diena</b></span></h2>
                        <div class="slideshow middle">
                        <div class="slides">
                            <input type="radio" name="r" id="r1">
                            <input type="radio" name="r" id="r2">
                            <input type="radio" name="r" id="r3">
                            <input type="radio" name="r" id="r4">
                            <input type="radio" name="r" id="r5">
                            <div class="slide s1">
                                <img src="admin/images/<?php echo $row['Image'];?>" width="550" height='300'>
                            </div>
                            <div class="slide">
                                <img src="admin/images/<?php echo $row['Image1'];?>" width="550" height='300'>
                            </div>
                            <div class="slide">
                                <img src="admin/images/<?php echo $row['Image2'];?>" width="550" height='300'>
                            </div>
                            <div class="slide">
                                <img src="admin/images/<?php echo $row['Image3'];?>" width="550" height='300'>
                            </div>
                            <div class="slide">
                                <img src="admin/images/<?php echo $row['Image4'];?>" width="550" height='300'>
                            </div>
                        </div>
                                <div class="navigation-slide">
                                    <label for="r1" class="bar-slide"></label>
                                    <label for="r2" class="bar-slide"></label>
                                    <label for="r3" class="bar-slide"></label>
                                    <label for="r4" class="bar-slide"></label>
                                    <label for="r5" class="bar-slide"></label>
                                </div>
                        </div>
                        <div class="car-details-info">
                            <h4>Papildus informācija</h4>
                            <hr>
                            <p><?php echo $row['VehicleDescription'];?>.</p>

                            <div class="technical-info">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="tech-info-table">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Brenda nosaukums</th>
                                                    <td><?php echo $row['BrandName'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Cena</th>
                                                    <td><?php echo $row['RentalPrice'];?>€ /diena</td>
                                                </tr>
                                                <tr>
                                                    <th>Motocikla modele</th>
                                                    <td><?php echo $row['VehicleModel'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Vietas</th>
                                                    <td><?php echo $row['SeatingCapacity'];?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                     
                        </div>
                    </div>
                </div>
                <?php } ?>
           
                    <div class="sidebar-content-wrap">

                        <?php if($_SESSION['vrmsuid']==0)
{ ?>
                       <div class="single-sidebar">
                            <h3>Rezervet tagad</h3>

                            <div class="sidebar-body">
                                <div class="social-icons text-center">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="name-input">
                                                    <input type="text" placeholder="Vards un uzvards" required="true" name="fullname">
                                                </div>
                                            </div>

                                            
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-12 col-md-12" style="padding-top: 20px">
                                                <div class="email-input">
                                                    <input type="email" placeholder="E-pasts"required="true" name="email">
                                                </div>
                                            </div>

                                           </div>

                                      <div class="row">
                                        <div class="col-lg-12 col-md-6" style="padding-top: 20px">
                                                <div class="email-input">
                                                    <input type="text" placeholder="Telefona numurs " maxlength="10" pattern="[0-9]+" required="true" name="mobnum">
                                                </div>
                                            </div>
                                         </div>
                                          <div class="row">
                                        <div class="col-lg-12 col-md-6" style="padding-top: 20px">
                                                <div class="email-input">
                                                    <textarea type="text" placeholder="Vietu sanemsanaj" required="true" name="location"></textarea>
                                                </div>
                                            </div>
                                           </div>
                             <div class="pick-up-date book-item" style="padding-top: 10px">
                             No datuma 
                                    
         <input type="date" id="startDate" placeholder="Sanemsanaj datums" name="bookingdate" required="true" />

                                    <div class="return-car">
                                    Lidz datuma
                                     <input type="date" id="endDate" placeholder="Nodosanaj datums" name="returndate" required="true" />
                                    </div>
                                </div>
                                        <div class="input-submit">
                                            <button type="submit" name="submit">Rezervet</button>
                                            <button type="reset">Nodzest</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } else {
                         
$uid=$_SESSION['vrmsuid'];
$sqlq=mysqli_query($con,"select * from user where ID='$uid'");
while($ret=mysqli_fetch_array($sqlq))
{
$fname=$ret['FirstName'];
$lname=$ret['LastName'];
$uemail=$ret['Email'];
$mnumebr=$ret['MobileNumber'];
} 
?>
                        <div class="single-sidebar">
                            <h3>Rezervet</h3>

                            <div class="sidebar-body">
                                <div class="social-icons text-center">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="name-input">
                                                    <input type="text" required="true" name="fullname" value="<?php echo $fname;?> <?php echo $lname;?>">
                                                </div>
                                            </div>

                                            
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-12 col-md-12" style="padding-top: 20px">
                                                <div class="email-input">
                                                    <input type="email" required="true" name="email" value="<?php echo $uemail;?>">
                                                </div>
                                            </div>

                                           </div>

                                      <div class="row">
                                        <div class="col-lg-12 col-md-6" style="padding-top: 20px">
                                                <div class="email-input">
                                                    <input type="text" value="<?php echo $mnumebr;?>" maxlength="10" pattern="[0-9]+" required="true" name="mobnum">
                                                </div>
                                            </div>
                                         </div>
                                          <div class="row">
                                        <div class="col-lg-12 col-md-6" style="padding-top: 20px">
                                                <div class="email-input">
                                                    <textarea type="text" placeholder="Sanemsanas vieta" required="true" name="location"></textarea>
                                                </div>
                                            </div>
                                           </div>
                             <div class="datepicker" style="padding-top: 10px">
                             No datuma 
                                    <input type="date" id="startDate" placeholder="Sanemsanas datums" name="bookingdate" date-format="yyyy-mm-dd" required="true" />

                                    <div class="return-car">
                                        Lidz datuma
                                     <input type="date" id="endDate" placeholder="Nodosanas datums" name="returndate" date-format="yyyy-mm-dd" required="true" />
                                    </div>
                                </div>
                                        <div class="input-submit">
<?php if($_SESSION['vrmsuid']==""){?>
<button type="submit" name="submit"><a href="login.php">Rezervet</a></button>
<?php } else {?>


                                            <button type="submit" name="submit">Rezervet</button>
                                         <?php }?>
                                            <button type="reset">Nodzest</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
              
            </div>
        </div>
    </section>
 

   <?php include_once('includes/footer.php');?>

</body>

</html>