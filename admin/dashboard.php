<?php ob_start(); ?>

<?php
//اذا كان في جلسة اطبع مرحبا بالاسم وائا لم يكن يعد الى لوحة التسجيل
session_start();
if(isset($_SESSION['Username'] )){
  // echo 'Welcome ' . $_SESSION['Username'] ;

  $pageTitle ='Dashboard';

include 'init.php';

// echo print_r($_SESSION);

include $tpl . "footer.php";

}else {
  header('Location: index.php');
  exit();
}
?>
<?php ob_end_flush(); ?> 



