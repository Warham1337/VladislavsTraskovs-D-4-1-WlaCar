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
$class=$_POST['class'];
$fuel=$_POST['fuel'];
$doors=$_POST['doors'];
$gearbox=$_POST['gearbox'];
$carac=$_POST['carac'];
$abs=$_POST['abs'];
$airbags=$_POST['airbags'];
$bluetooth=$_POST['bluetooth'];
$carkit=$_POST['carkit'];
$gps=$_POST['gps'];
$music=$_POST['music'];
$carlock=$_POST['carlock'];
$vid=$_GET['editid'];

 $query=mysqli_query($con,"update car set CategoryName='$catname',BrandName='$brand',VehicleName='$vehname',RegistrationNumber='$regnum',RentalPrice='$renprice',VehicleModel='$modyrs',VehicleDescription='$vehdesc',SeatingCapacity='$seatingcap',Class='$class',Fuel='$fuel',Doors='$doors',GearBox='$gearbox' where ID='$vid'");

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
    <title>Admin panele | Rediget auto</title>
   
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
         
            <h2 class="main-title-w3layouts mb-2 text-center"> Plasa informacija par auto</h2>
         
               <section class="forms-section">

               
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Rediget</h4>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p style="font-size:16px; color:red" align="left"> <?php if($msg){
    echo $msg;
  }  ?> </p>

  <?php
 $vid=$_GET['editid'];
$ret=mysqli_query($con,"select * from car where ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Transporta kategorija</label>
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
                                <label for="inputPassword4">Transporta brends</label>
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
                                <label for="inputEmail4">Transporta nosaukums</label>
                                <input type="text" class="form-control" id="vehname" name="vehname" required="true" value="<?php echo $row['VehicleName'];?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Transporta registracijas numurs</label>
                               <input type="text" class="form-control" id="regnum" name="regnum" required="true" value="<?php echo $row['RegistrationNumber'];?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Cena diena</label>
                            <input type="text" class="form-control" id="renprice" name="renprice" required="true" value="<?php echo $row['RentalPrice'];?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Transporta gads</label>
                               <input type="text" class="form-control" id="modyrs" name="modyrs" required="true" value="<?php echo $row['VehicleModel'];?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Papild informacija par transportu</label>
                                    <textarea class="form-control" id="vehdesc" name="vehdesc" rows="3" required="true">"<?php echo $row['VehicleDescription'];?>"</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Vietas</label>
                                    <input class="form-control" id="seatingcap" name="seatingcap" rows="3" required="true"value="<?php echo $row['SeatingCapacity'];?>">
                                </div>
                                <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputCity">Klase</label>
                                <input type="text" class="form-control" id="class" name="class" required="true" value="<?php echo $row['Class'];?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">Degviela</label>
                                <input type="text" class="form-control" id="fuel" name="fuel" required="true" value="<?php echo $row['Fuel'];?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputZip">Durvju sk.</label>
                                <input type="text" class="form-control" id="doors" name="doors" required="true" value="<?php echo $row['Doors'];?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputZip">Atr. karba</label>
                                <input type="text" class="form-control" id="gearbox" name="gearbox" required="true" value="<?php echo $row['GearBox'];?>">
                            </div>
                        </div>
                        <h4 class="mb-3">Air Condition</h4>
                         <?php  if($row['AirCondition']=="Yes"){ ?>
                        <div class="d-block my-3">
                           
                                    <div class="custom-control custom-radio">
                                        <input  id="carac" type="radio" name="carac" value="Yes" required="true" checked="true"/>
                                        <label class="custom-control-label" for="credit">Ir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="carac" type="radio" name="carac" value="No" required="true"/ >
                                        <label class="custom-control-label" for="debit">Nav</label>
                                    </div>
                                  

                                </div>
<?php } else { ?>
    <div class="d-block my-3">
                           
                                    <div class="custom-control custom-radio">
                                        <input  id="carac" type="radio" name="carac" value="Yes" required="true" >
                                        <label class="custom-control-label" for="credit">Ir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="carac" type="radio" name="carac" value="No" required="true" checked="true" / >
                                        <label class="custom-control-label" for="debit">Nav</label>
                                    </div>
                                  

                                </div>
                                <?php } ?>

                                <h4 class="mb-3">ABS</h4>
                                 <?php  if($row['ABS']=="Yes"){ ?>
                        <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="abs" type="radio" name="abs" value="Yes" required="true"/ checked="true">
                                        <label class="custom-control-label" for="credit">Ir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="abs" type="radio" name="abs" value="No" required="true"/>
                                        <label class="custom-control-label" for="debit">Nav</label>
                                    </div>
                                    
                                </div><?php } else { ?>
                                    <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="abs" type="radio" name="abs" value="Yes" required="true"/ checked="true">
                                        <label class="custom-control-label" for="credit">Ir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="abs" type="radio" name="abs" value="No" required="true"/>
                                        <label class="custom-control-label" for="debit">Nav</label>
                                    </div>
                                    
                                </div>
                                <?php } ?>
                                <h4 class="mb-3">Air Bags</h4>
                                <?php  if($row['AirBags']=="Yes"){ ?>
                        <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="airbags" type="radio" name="airbags" value="Yes" required="true"/ checked="true">
                                        <label class="custom-control-label" for="credit">Ir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="airbags" type="radio" name="airbags" value="No" required="true"/>
                                        <label class="custom-control-label" for="debit">Nav</label>
                                    </div>
                                    
                                </div>
                                <?php } else { ?>
                                    <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="airbags" type="radio" name="airbags" value="Yes" required="true"/>
                                        <label class="custom-control-label" for="credit">Ir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="airbags" type="radio" name="airbags" value="No" required="true" checked="true"/>
                                        <label class="custom-control-label" for="debit">Nav</label>
                                    </div>
                                    
                                </div>
                                <?php } ?>
                                <h4 class="mb-3">Bluetooth</h4>
                                <?php  if($row['Bluetooth']=="Yes"){ ?>
                        <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="bluetooth" type="radio" name="bluetooth" value="Yes" required="true"checked="true"/>
                                        <label class="custom-control-label" for="credit">Ir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="bluetooth" type="radio" name="bluetooth" value="No" required="true"/>
                                        <label class="custom-control-label" for="debit">Nav</label>
                                    </div>
                                    
                                </div>
                                <?php } else { ?>
                                    <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="bluetooth" type="radio" name="bluetooth" value="Yes" required="true"/>
                                        <label class="custom-control-label" for="credit">Ir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="bluetooth" type="radio" name="bluetooth" value="No" required="true" checked="true"/>
                                        <label class="custom-control-label" for="debit">Nav</label>
                                    </div>
                                    
                                </div>
                                <?php } ?>
                                <h4 class="mb-3">Car Kit</h4>
                                <?php  if($row['Bluetooth']=="Yes"){ ?>
                        <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="carkit" type="radio" name="carkit" value="Yes" required="true"/ checked="true">
                                        <label class="custom-control-label" for="credit">Ir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="carkit" type="radio" name="carkit" value="No" required="true"/>
                                        <label class="custom-control-label" for="debit">Nav</label>
                                    </div>
                                    
                                </div>
                                 <?php } else { ?>
                                    <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="carkit" type="radio" name="carkit" value="Yes" required="true"/ >
                                        <label class="custom-control-label" for="credit">Ir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="carkit" type="radio" name="carkit" value="No" required="true" checked="true"/>
                                        <label class="custom-control-label" for="debit">Nav</label>
                                    </div>
                                    
                                </div>
                                <?php } ?>
                                <h4 class="mb-3">GPS</h4>
                                <?php  if($row['GPS']=="Yes"){ ?>
                        <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="gps" type="radio" name="gps" value="Yes" required="true"/ checked="true">
                                        <label class="custom-control-label" for="credit">Ir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="gps" type="radio" name="gps" value="No" required="true"/>
                                        <label class="custom-control-label" for="debit">Nav</label>
                                    </div>
                                    
                                </div>
                                <?php } else { ?>
                                    <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="gps" type="radio" name="gps" value="Yes" required="true"/>
                                        <label class="custom-control-label" for="credit">Ir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="gps" type="radio" name="gps" value="No" required="true" checked="true"/>
                                        <label class="custom-control-label" for="debit">Nav</label>
                                    </div>
                                    
                                </div>
                                <?php } ?>
                                <h4 class="mb-3">Music</h4>
                                <?php  if($row['Music']=="Yes"){ ?>
                        <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="music" type="radio" name="music" value="Yes" required="true"/ checked="true">
                                        <label class="custom-control-label" for="credit">Ir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="music" type="radio" name="music" value="No" required="true"/>
                                        <label class="custom-control-label" for="debit">Nav</label>
                                    </div>
                                    
                                </div>
                                <?php } else { ?>
                                    <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="music" type="radio" name="music" value="Yes" required="true"/>
                                        <label class="custom-control-label" for="credit">Ir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="music" type="radio" name="music" value="No" required="true" checked="true"/>
                                        <label class="custom-control-label" for="debit">Nav</label>
                                    </div>
                                    
                                </div>
                                <?php } ?>
                                <h4 class="mb-3">Signalizacija</h4>
                                <?php  if($row['CenterLocking']=="Yes"){ ?>
                        <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="carlock" type="radio" name="carlock" value="Yes" required="true"/ checked="true">
                                        <label class="custom-control-label" for="credit">Ir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="carlock" type="radio" name="carlock" value="No" required="true"/>
                                        <label class="custom-control-label" for="debit">Nav</label>
                                    </div>
                                    
                                </div>
                                <?php } else { ?>
<div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="carlock" type="radio" name="carlock" value="Yes" required="true"/ >
                                        <label class="custom-control-label" for="credit">Ir</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="carlock" type="radio" name="carlock" value="No" required="true" checked="true"/>
                                        <label class="custom-control-label" for="debit">Nav</label>
                                    </div>
                                    
                                </div>
                                <?php } ?>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Bilde 1</label>
                                <img src="images/<?php echo $row['Image'];?>" width="200" height="150" value="<?php  echo $row['Image'];?>"><a href="changeimagefw.php?editid=<?php echo $row['ID'];?>"> &nbsp; Rediget</a>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Bilde 2</label>
                                <img src="images/<?php echo $row['Image1'];?>" width="200" height="150" value="<?php  echo $row['Image1'];?>"><a href="changeimagefw1.php?editid=<?php echo $row['ID'];?>"> &nbsp; Rediget</a>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">Bilde 3</label>
                                <img src="images/<?php echo $row['Image2'];?>" width="200" height="150" value="<?php  echo $row['Image2'];?>"><a href="changeimagefw2.php?editid=<?php echo $row['ID'];?>"> &nbsp; Rediget</a>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Bilde 4</label>
                                <img src="images/<?php echo $row['Image3'];?>" width="200" height="150" value="<?php  echo $row['Image3'];?>"><a href="changeimagefw3.php?editid=<?php echo $row['ID'];?>"> &nbsp; Rediget</a>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Bilde 5</label>
                                <img src="images/<?php echo $row['Image4'];?>" width="200" height="150" value="<?php  echo $row['Image4'];?>"><a href="changeimagefw4.php?editid=<?php echo $row['ID'];?>"> &nbsp; Rediget</a>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">Bilde 6</label>
                                <img src="images/<?php echo $row['Image5'];?>" width="200" height="150" value="<?php  echo $row['Image5'];?>"><a href="changeimagefw5.php?editid=<?php echo $row['ID'];?>"> &nbsp; Rediget</a>
                            </div>
                        </div>
                        <?php } ?>
                       <p style="text-align: center;"><button type="submit" class="btn btn-primary" name="submit">Rediget</button></p>
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