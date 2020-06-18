<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
    <header>
       <div class="logo"><a href="index.php">WlaCar</a></div>
       <nav class="active">
            <ul>
                <li><a href="about.php">Par mums</a></li>
                <li><a href="contact.php">Kontaktēt</a></li>
                <li class="sub-menu"><a href="#">Transports</a>
                    <ul>
                        <li><a href="car-list.php">Automašīnas</a></li>
                        <li><a href="bike-list.php">Motocikli</a></li>
                    </ul>
                </li>
<?php if (strlen($_SESSION['vrmsuid']!=0)) {?>           
                <li class="sub-menu"><a href="">Rezervācijas</a>
                    <ul>           
                        <li><a href="car-booking.php">Automašīnas</a></li>
                        <li><a href="bike-booking.php">Motocikli</a></li>    
                    </ul>
                </li>
                <li><a href="">Profils</a>
                    <ul class="sub-menu">
                        <li><a href="profile.php">Iestatījumi</a> </li>
                        <li><a href="logout.php">Iziet</a></li>
                    </ul>
                </li>
<?php } ?>
<?php if (strlen($_SESSION['vrmsuid']==0)) {?>
                <li><a href="login.php">Pieslēgties/Reģistrēties</a></li>
<?php } ?>    
            </ul>
       </nav>
       <div class="menu-toggle">
           <i class="fa fa-bars" aria-hidden="true"></i>
       </div>
        
    </header>