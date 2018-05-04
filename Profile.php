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


<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Profile Page</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div>
<div class="container">
<ul uk-accordion>
  
    <li>
        <a class="uk-accordion-title" href="#">My Information</a>
        <div class="uk-accordion-content">
        <div class="my-info">

        <div class="panel panel-default">
             <div class="panel-body">
             Panel Content
             </div>
            <div class="panel-footer">
            Panel Footer
            </div>
        </div> 
        </div>
        </div>
    </li>
    <li>
        <a class="uk-accordion-title" href="#">My Ads</a>
        <div class="uk-accordion-content">
        <div class="my-Ads">

        <div class="panel panel-default">
             <div class="panel-body">
             Panel Content
             </div>
            <div class="panel-footer">
            Panel Footer
            </div>
        </div> 
        </div> 

        </div>
    </li>
    <li class="uk-open">
        <a class="uk-accordion-title" href="#">Latest Comment </a>
        <div class="uk-accordion-content">
        <div class="my-comment">

        <div class="panel panel-default">
             <div class="panel-body">
             Panel Content
             </div>
            <div class="panel-footer">
            Panel Footer
            </div>
        </div>   
        </div>
        </div> 

    </li>
</ul>
	</div>
									



<?php
include $tpl . "footer.php";
?>

 <?php ob_end_flush(); ?> 
