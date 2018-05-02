<?php ob_start(); ?>

<?php
session_start();
  // echo 'Welcome ' . $_SESSION['Username'] ;

  $pageTitle ='';


// Start Categorise Page



if(isset($_SESSION['Username'])){
  
        include 'init.php';
        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage' ;

        if( $do == 'Manage'){


        }elseif ($do  == 'Add') {
   

        }elseif ($do  == 'Insert') {
            

        }elseif ($do  == 'Edit') {
            

        }elseif ($do  == 'Update') {
            t

        }elseif ($do  == 'Delete') {
            

        }elseif ($do  == 'Activate') {
            

       

        }
            // End  page
include $tpl . "footer.php";

}else {
  header('Location: index.php');
  exit();
}
 ob_end_flush(); ?> 
