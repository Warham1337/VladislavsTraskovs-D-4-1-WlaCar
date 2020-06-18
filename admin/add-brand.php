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
    $aid=$_SESSION['vrmsaid'];
    $bname=$_POST['brandname'];
  
   $logo=$_FILES["images"]["name"];
     $extension = substr($logo,strlen($logo)-4,strlen($logo));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Kluda. Var izmantoto bildes tikaj jpg / jpeg/ png /gif formata');</script>";
}
else
{

$brandlogo=md5($logo).$extension;
     move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$brandlogo);
    $query=mysqli_query($con, "insert into brand(BrandName,BrandLogo) value('$bname','$brandlogo')");
    if ($query) {
echo "<script>alert('Brends veiksmigi pievienots.');</script>";
echo "<script>window.location.href ='add-brand.php'</script>";
  }
  else
    {
      $msg="Kluda. Meginiet vel reiz.";
    }

  }

}
  ?>
<!DOCTYPE html>
<html lang="lv">

<head>
    <title>Admin panele | Pievienot jaunu brendu</title>

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

            <h2 class="main-title-w3layouts mb-2 text-center"> Transporta brends</h2>

            <section class="forms-section">

                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4"> Pievienot</h4>

                    <form action="#" method="post" enctype="multipart/form-data">
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Brenda nosaukums</label>
                                
                                <input class=" form-control" id="brandname" name="brandname" type="text" value="" required="true">
                            </div>
                           
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Brenda logotips</label>
                                
                                <input type="file" class="form-control" name="images" id="images" value="" required="true">
                            </div>
                           
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="submit">Pievienot</button>
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