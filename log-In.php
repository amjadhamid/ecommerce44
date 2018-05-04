<?php ob_start(); ?>
<?php

// session_start();
// print_r($_SESSION);// للتحقق اذا كان هناك جلسة
// if(isset($_SESSION['Username']   )){
//    header('Location: dashboard.php'); //Redirect to Dashboard page
// }

$noNavbar = ' ';
$pageTitle ='Login';


include "init.php";
?>
<script>

<h1 class="text-center select" data-class="login-span">login </h1>|
<h1 class="text-center select"  data-class="sign-up-span">sign up</h1>


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST"  >
			           
								

                                
								<div>
    <button class="uk-button uk-button-default" type="button" uk-toggle="target: #toggle-usage">login</button>
             
					<div class="login ">
                    <span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input " data-validate = "Valid name is: a@b.c">
						<input 
                        class="input100 username" 
                        type="text" 
                        name="user"
                        required="required"
                        >
						<span class="focus-input100" data-placeholder="Username"></span>
					
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" 
                        type="password"
                         name="pass"
                        required="required"
                        >
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="errors"> 

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

				
					</div>
                   </div>

				   			</form>
			</div>
		</div>
	</div>

				   </div>

        
			   <div>
    <button class="uk-button uk-button-default" type="button" uk-toggle="target: #toggle-usage">sign-up</button>
             
                              <div class="sign-up">
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

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
                            Sign Up
							</button>
						</div>
					</div>

					</div> 
                  </div>		


				</form>
			</div>
		</div>
	</div>

	</div>








<?
include $tpl . "footer.php";
?>

 <?php ob_end_flush(); ?> 
