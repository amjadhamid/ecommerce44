<?php ob_start(); ?>
<?php

session_start();
if(isset($_SESSION['user']   )){
   header('Location: Profile.php'); //Redirect to Dashboard page
}

$noNavbar = ' ';
$pageTitle ='Login';


include "init.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){


	//Assigne variables
	// <!-- VALIDATE WITH filter -->
	$username = $_POST['user'] ;
	$password =  $_POST['pass'];
	$hashedPass = sha1($password);


	$stmt = $con->prepare("SELECT 
	Username , Password 
	   FROM 
	   users
	   WHERE 
	   Username = ? 
	   AND Password = ?
   
	   LIMIT 1
		  ");
// عند جلب البيانات هناك عملتين check fetch
$stmt->execute(array($username ,$hashedPass ));//التحقق
$row =$stmt->fetch();
$count = $stmt->rowCount();//عدد الصفوف

// echo $count; 

if($count > 0 ){
// echo 'Welcome ' . $username ;
$_SESSION['user']  =  $username ;  //Register username
// UserId is array
header('Location: index.php');
exit();

}

}



?>


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST"  >
			           
								

                                
					
					
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

		<div class="wrap-input100 validate-input " data-validate = "Valid name is: a@b.c">
						<input class="input100 username" type="email" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					
					
					</div>


					<div class="wrap-input100 validate-input " data-validate = "Valid name is: a@b.c">
						<input class="input100 username" type="text" name="user">
						<span class="focus-input100" data-placeholder="Username"></span>
					
					
					</div>


                    
				
					
				
					
					
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="errors"> 

					<!--   validate in one inbut -->
                                <!-- <?php  
                            //  if(isset($formErrors)){
                            //   foreach ($formErrors as $error) {
                            //  	 echo $error . '<br/>';
                            //   }
                             
                            //  }

                             ?> -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="ssignup.php">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>








<?
include $tpl . "footer.php";
?>

 <?php ob_end_flush(); ?> 
