<?php ob_start(); ?>
<?php

session_start();
// print_r($_SESSION);// للتحقق اذا كان هناك جلسة
// if(isset($_SESSION['Username']   )){
//    header('Location: dashboard.php'); //Redirect to Dashboard page
// }

$pageTitle ='Profile';


include "init.php";
?>

							



<?php
include $tpl . "footer.php";
?>

 <?php ob_end_flush(); ?> 
