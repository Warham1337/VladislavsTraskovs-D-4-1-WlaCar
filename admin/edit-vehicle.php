<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$cmsaid=$_SESSION['vrmsaid'];
$catname=$_POST['catname'];
$brand=$_POST['brand'];
$vehname=$_POST['vehname'];
$regnum=$_POST['regnum'];
$renprice=$_POST['renprice'];
$modyrs=$_POST['modyrs'];
$vehdesc=$_POST['vehdesc'];
$seatingcap=$_POST['seatingcap'];
$vid=$_GET['editid'];

 $query=mysqli_query($con,"update moto set CategoryName='$catname',BrandName='$brand',VehicleName='$vehname',RegistrationNumber='$regnum',RentalPrice='$renprice',VehicleModel='$modyrs',VehicleDescription='$vehdesc',SeatingCapacity='$seatingcap' where ID='$vid'");

    if ($query) {
    $msg="Vehicle details has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin panele | Rediģēt</title>
   

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
 
            <h2 class="main-title-w3layouts mb-2 text-center">Motocikli</h2>
   
               <section class="forms-section">

               
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Rediģēt</h4>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p style="font-size:16px; color:red" align="left"> <?php if($msg){
    echo $msg;
  }  ?> </p>

  <?php
 $vid=$_GET['editid'];
$ret=mysqli_query($con,"select * from moto where ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Kategorija:</label>
                                <select class="form-control"  name="catname" id="catname" required="true">
                                        <option value="<?php echo $row['CategoryName'];?>"><?php echo $row['CategoryName'];?></option>
                                <?php $query1=mysqli_query($con,"select * from  category");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['CategoryName'];?>"><?php echo $row1['CategoryName'];?></option>
                  <?php } ?>
                                    </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Brends:</label>
                               <select class="form-control" id="brand" name="brand" required="true">
                                        <option value="<?php echo $row['BrandName'];?>"><?php echo $row['BrandName'];?></option>
                                <?php $query2=mysqli_query($con,"select * from  brand");
              while($row2=mysqli_fetch_array($query2))
              {
              ?>    
              <option value="<?php echo $row2['BrandName'];?>"><?php echo $row2['BrandName'];?></option>
                  <?php } ?>
                                    </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Modele:</label>
                                <input type="text" class="form-control" id="vehname" name="vehname" required="true" value="<?php echo $row['VehicleName'];?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Reģistrācijas numurs:</label>
                               <input type="text" class="form-control" id="regnum" name="regnum" required="true" value="<?php echo $row['RegistrationNumber'];?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Dienas cena:</label>
                            <input type="text" class="form-control" id="renprice" name="renprice" required="true" value="<?php echo $row['RentalPrice'];?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Izlaiduma gads:</label>
                               <input type="text" class="form-control" id="modyrs" name="modyrs" required="true" value="<?php echo $row['VehicleModel'];?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Informācija:</label>
                                    <textarea class="form-control" id="vehdesc" name="vehdesc" rows="3" required="true">"<?php echo $row['VehicleDescription'];?>"</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Vietu skaits:</label>
                                    <input class="form-control" id="seatingcap" name="seatingcap" rows="3" required="true"value="<?php echo $row['SeatingCapacity'];?>">
                                </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Bilde nr.1</label>
                                <img src="images/<?php echo $row['Image'];?>" width="200" height="150" value="<?php  echo $row['Image'];?>"><a href="changeimagetw.php?editid=<?php echo $row['ID'];?>"> &nbsp; Rediģēt</a>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Bilde nr.2</label>
                                <img src="images/<?php echo $row['Image1'];?>" width="200" height="150" value="<?php  echo $row['Image1'];?>"><a href="changeimagetw1.php?editid=<?php echo $row['ID'];?>"> &nbsp; Rediģēt</a>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">Bilde nr.3</label>
                                <img src="images/<?php echo $row['Image2'];?>" width="200" height="150" value="<?php  echo $row['Image2'];?>"><a href="changeimagetw2.php?editid=<?php echo $row['ID'];?>"> &nbsp; Rediģēt</a>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Bilde nr.4</label>
                                <img src="images/<?php echo $row['Image3'];?>" width="200" height="150" value="<?php  echo $row['Image3'];?>"><a href="changeimagetw3.php?editid=<?php echo $row['ID'];?>"> &nbsp; Rediģēt</a>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Bilde nr. 5</label>
                                <img src="images/<?php echo $row['Image4'];?>" width="200" height="150" value="<?php  echo $row['Image4'];?>"><a href="changeimagetw4.php?editid=<?php echo $row['ID'];?>"> &nbsp; Rediģēt</a>
                            </div>
                        </div>
                        <?php } ?>
                       <p style="text-align: center;"><button type="submit" class="btn btn-primary" name="submit">Rediģēt</button></p>
                    </form>
                </div>
       
               
            </section>


           <?php include_once('includes/footer.php');?>

        </div>
    </div>


    <script src='js/jquery-2.2.3.min.js'></script>
  
    <script src="js/sidebar-j.js"></script>
 
    <script>
    
        (function () {
            'use strict';

            window.addEventListener('load', function () {
          
                var forms = document.getElementsByClassName('needs-validation');

            
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
 
</body>
</html>
<?php }  ?>