<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">

    
<title><?php getTitle() ?></title>
    
        <!-- Fonts -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link rel="stylesheet" href= "<?php echo $css ;?>backend.css">
        <link rel="stylesheet" href= " layout/css/jquery-ui.css">
        <link rel="stylesheet" href= " layout/css/jquery.selectBoxIt.css">

       

        <!-- Styles -->
     
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.42/css/uikit.min.css" />


  <body>
 <div class="upper-bar">

     <div class="container">
<?php 
if(isset($_SESSION['user'])){
echo 'Welcome' . ' ' . $_SESSION['user'] ;
 echo  '  |  ' . '<a href="Profile.php">My profile</a>' ;
 ?>
 <a href="logout.php">
    <span class="pull-right">
    logout
    </span>
  </a>

 <?php
$userStatus = checkUserStatus($_SESSION['user']);
if ($userStatus == 1){
  echo ' Your Membership Need to Activite By Admin';
}
}else{
  ?>
  <a href="login.php">
    <span class="pull-right">
    Login/signup
    </span>
  </a>
 
  </div>
  <?php
} 
?>
     
     </div>
    <div>


    <!--  -->
<!-- $categories = getCat();
foreach ($categories as $key ) {
	echo $key['Name'];
} -->
