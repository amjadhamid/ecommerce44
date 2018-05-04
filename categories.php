<?php ob_start(); ?>
<?php
include 'init.php';
  $pageTitle ='categories';
?>

 
  <?php 
  $items =  getItems($_GET['pageid'] );
  
  foreach ($items as $key) {
?>
  <h1 class="text-center"><?php echo str_replace(' ','-', $_GET['pagename']) ?></h1>
  <div calss="container">
  
  <div calss="row">
   <div class="col-lg-4 col-sm-6 col-md-4">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="no_image.JFIF" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php $key['Name']?></h5>
    <p class="card-text"><?php $key['Description']?></p>
    <a href="#" class="btn btn-primary"><?php $key['Price']?></a>
  </div>
</div>
</div>
</div>
<?php
  }
  
            // End  page
include $tpl . "footer.php";

 ob_end_flush(); ?> 
