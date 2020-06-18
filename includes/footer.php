<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?> 
    <section id="footer-area">
    
        <div class="footer-widget-area">
            <div class="container">
                <div class="row">
              
                    <div class="col-lg-4 col-md-6">
                        <?php 
 $query=mysqli_query($con,"select * from  info where PageType='aboutus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
                        <div class="single-footer-widget">
                            <div class="widget-body">
                            <h2>Wlacar</h2>
                                <p><?php  echo $row['PageDescription'];?>.</p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
               
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <h2>Menu</h2>
                            <div class="footer-list">
                                <ul>
                                    <li><a href="about.php"><i class="fa fa-info" aria-hidden="true"></i>   Par mums</a></li>
                                    <li><a href="contact.php"><i class="fa fa-address-book" aria-hidden="true"></i>   Kontaktēt ar mums</a></li>
                                    <li><a href="bike-list.php"><i class="fa fa-motorcycle" aria-hidden="true"></i>    Izvēlēties motociklu</a></li>
                                    <li><a href="car-list.php"><i class="fa fa-car" aria-hidden="true"></i>   Izvēlēties automašīnu</a></li>
                                    <li><a href="admin/login.php"><i class="fa fa-cog" aria-hidden="true"></i>   Admin panele</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
           
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <?php 
 $query=mysqli_query($con,"select * from  info where PageType='contactus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
                            <h2>Kontakti</h2>
                            <div class="widget-body">
                                <div class="footer-area">
                                <ul class="get-touch">
                                    <li><i class="fa fa-map-marker"></i> <?php  echo $row['PageDescription'];?></li>
                                    <li><i class="fa fa-mobile"></i> +<?php  echo $row['MobileNumber'];?></li>
                                    <li><i class="fa fa-envelope"></i> <?php  echo $row['Email'];?></li>
                                </ul>
                                </div>
                               </div>
                        </div>
                        <?php } ?>
                    </div>
               
                </div>
            </div>
        </div>

    </section>

