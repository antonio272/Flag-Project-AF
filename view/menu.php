
<?php
    if(!isset($_SESSION["patient_id"])) {
?>
            <li><a href="<?=BASE_PATH?>about"><i class="fas fa-share-alt"></i> About</a></li>
            <li><a href="<?=BASE_PATH?>doctors"><i class="far fa-address-card"></i> Doctors</a></li>
            <li><a href="<?=BASE_PATH?>access/register"><i class="fas fa-user"></i>Register</a></li>
            <li><a href="<?=BASE_PATH?>access/login"><i class="fas fa-user"></i>Login</a></li>
<?php
    }
    else {
?>
            <li><a href="<?=BASE_PATH?>about"><i class="fas fa-share-alt"></i> About</a></li>
            <li><a href="<?=BASE_PATH?>doctors"><i class="far fa-address-card"></i> Doctors</a></li>
            
            <li><a href="<?=BASE_PATH?>access/logout"><i class="fas fa-user"></i>Logout</a></li>
<?php
    }
?>
            
           