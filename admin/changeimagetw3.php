<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {
    $imgid=$_GET['editid'];
     $img=$_FILES["images"]["name"];
     $extension = substr($img,strlen($img)-4,strlen($img));

$allowed_extensions = array(".jpg","jpeg",".png",".gif");

if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$vehimg=md5($img).$extension;
     move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$vehimg);
    $query=mysqli_query($con, "update moto set Image3 ='$vehimg' where ID='$imgid'");
    if ($query) {
    $msg="Vehicle Image has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  }
}
  ?>
<!DOCTYPE html>
<html lang="lv">

<head>
    <title>Admin panele | Transporta bilde</title>
   

   
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
           
            <h2 class="main-title-w3layouts mb-2 text-center"> Motocikls</h2>
          
            <section class="forms-section">

        
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4"> Rediģēt</h4>

                    <form action="#" method="post" enctype="multipart/form-data">
                        <p style="font-size:16px; color:red" align="left"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <?php
 $imgid=$_GET['editid'];
$ret=mysqli_query($con,"select * from  moto where ID='$imgid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Modele:</label>
                                
                                <input type="text" class="form-control" id="vehname" name="vehname" readonly="true" value="<?php echo $row['VehicleName'];?>">
                            </div>
                           
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Jauna transporta bilde nr. 4</label>
                                
                                <input class="form-control" id="images" name="images"  type="file" required="true" value="">
                            </div>
                           
                        </div>
                        
                        <?php } ?>
                        
                        <button type="submit" class="btn btn-primary" name="submit">Rediģēt</button>
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