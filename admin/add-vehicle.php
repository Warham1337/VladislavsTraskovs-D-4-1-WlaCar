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

$pic=$_FILES["image"]["name"];
$extension = substr($pic,strlen($pic)-4,strlen($pic));

$pic1=$_FILES["image1"]["name"];
$extension1 = substr($pic1,strlen($pic1)-4,strlen($pic1));

$pic2=$_FILES["image2"]["name"];
$extension2 = substr($pic2,strlen($pic2)-4,strlen($pic2));

$pic3=$_FILES["image3"]["name"];
$extension3 = substr($pic3,strlen($pic3)-4,strlen($pic3));

$pic4=$_FILES["image4"]["name"];
$extension4 = substr($pic4,strlen($pic4)-4,strlen($pic4));

$allowed_extensions = array(".jpg","jpeg",".png",".gif");

if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Kluda 1 bilde. Var izmantoto bildes tikaj jpg / jpeg/ png /gif formata');</script>";
}
if(!in_array($extension1,$allowed_extensions))
{
echo "<script>alert('Kluda 2 bilde. Var izmantoto bildes tikaj jpg / jpeg/ png /gif formata');</script>";
}
if(!in_array($extension2,$allowed_extensions))
{
echo "<script>alert('Kluda 3 bilde. Var izmantoto bildes tikaj jpg / jpeg/ png /gif formata');</script>";
}
if(!in_array($extension3,$allowed_extensions))
{
echo "<script>alert('Kluda 4 bilde. Var izmantoto bildes tikaj jpg / jpeg/ png /gif formata');</script>";
}
if(!in_array($extension4,$allowed_extensions))
{
echo "<script>alert('Kluda 5 bilde. Var izmantoto bildes tikaj jpg / jpeg/ png /gif formata');</script>";
}
else
{

$vehpic=md5($pic).time().$extension;
$vehpic1=md5($pic1).time().$extension1;
$vehpic2=md5($pic2).time().$extension2;
$vehpic3=md5($pic3).time().$extension3;
$vehpic4=md5($pic4).time().$extension4;
     move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$vehpic);
     move_uploaded_file($_FILES["image1"]["tmp_name"],"images/".$vehpic1);
     move_uploaded_file($_FILES["image2"]["tmp_name"],"images/".$vehpic2);
     move_uploaded_file($_FILES["image3"]["tmp_name"],"images/".$vehpic3);
     move_uploaded_file($_FILES["image4"]["tmp_name"],"images/".$vehpic4);

 $query=mysqli_query($con,"insert into moto(CategoryName,BrandName,VehicleName,RegistrationNumber,RentalPrice,VehicleModel,VehicleDescription,SeatingCapacity,Image,Image1,Image2,Image3,Image4) value('$catname','$brand','$vehname','$regnum','$renprice','$modyrs','$vehdesc','$seatingcap','$vehpic','$vehpic1','$vehpic2','$vehpic3','$vehpic4','$vehpic5')");

    if ($query) {
    echo '<script>alert("Transports ir pievienots..")</script>';
echo "<script>window.location.href ='add-vehicle.php'</script>";
  }
  else
    {
         echo '<script>alert("Kluda. Pameginiet vel reiz.")</script>';
    }
}
}
?>
<!DOCTYPE html>
<html lang="lv">

<head>
    <title>Admin panele| Pievienot transportu </title>

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
            <!-- top-bar -->
       <?php include_once('includes/header.php');?>
 
            <h2 class="main-title-w3layouts mb-2 text-center"> Pievienot jaunu motociklu</h2>
 
               <section class="forms-section">

               
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Detaļas</h4>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Kategorija:</label>
                                <select class="form-control"  name="catname" id="catname" required="true">
<?php $query=mysqli_query($con,"select * from category order by id limit 1");
while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['CategoryName'];?>"><?php echo $row['CategoryName'];?></option>
                  <?php } ?> 
                                    </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Brends:</label>
                               <select class="form-control" id="brand" name="brand" required="true">
                                        <?php $query=mysqli_query($con,"select * from brand");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['BrandName'];?>"><?php echo $row['BrandName'];?></option>
                  <?php } ?> 
                                    </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Modele:</label>
                                <input type="text" class="form-control" id="vehname" name="vehname" required="true">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Reģistrācijas numurs:</label>
                               <input type="text" class="form-control" id="regnum" name="regnum" required="true">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Dienas cena:</label>
                            <input type="text" class="form-control" id="renprice" name="renprice" required="true">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Izlaiduma gads:</label>
                               <input type="text" class="form-control" id="modyrs" name="modyrs" required="true">
                            </div>
                        </div>
                        
                        <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Informācija:</label>
                                    <textarea class="form-control" id="vehdesc" name="vehdesc" rows="3" required="true"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Vietu skaits:</label>
                                    <input class="form-control" id="seatingcap" name="seatingcap" rows="3" required="true">
                                </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Bilde nr.1</label>
                                <input type="file" class="form-control" id="image" name="image" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Bilde nr.2</label>
                                <input type="file" class="form-control" id="image1" name="image1" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">Bilde nr.3</label>
                                <input type="file" class="form-control" id="image2" name="image2" required="true">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Bilde nr.4</label>
                                <input type="file" class="form-control" id="image3" name="image3" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Bilde nr. 5</label>
                                <input type="file" class="form-control" id="image4" name="image4" required="true">
                            </div>
                        </div>
                       <p style="text-align: center;"><button type="submit" class="btn btn-primary" name="submit">Saglabāt</button></p>
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