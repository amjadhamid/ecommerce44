<?php


//Router for more dynamic
$tpl = 'include/templates/';//Template Directory
$css = 'layout/css/';
$func = 'include/functions/';

$js = 'layout/js/';
$lang = 'include/lang/';

//include the important
require 'include/functions/function.php';
include  $lang . 'englich.php';//the first thing


include "include/module/connect.php";
include  $tpl . 'header.php';


//include navbar on all pages expect the
//one with $noNavbar
if (!isset($noNavbar)){
include  $tpl . 'navbar.php';
}
?>




                            <!-- confirm jquery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>



    <!-- google fonts -->
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif" rel="stylesheet">




<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Login_v2/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v2/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v2/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v2/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login_v2/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v2/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v2/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login_v2/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v2/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login_v2/css/main.css">
<!--===============================================================================================-->



<!--===============================================================================================-->
	<script src="Login_v2/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v2/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v2/vendor/bootstrap/js/popper.js"></script>
	<script src="Login_v2/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v2/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v2/vendor/daterangepicker/moment.min.js"></script>
	<script src="Login_v2/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Login_v2/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Login_v2/js/main.js"></script>


	<!-- ================================================ -->
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="layout/js/backend.js"></script>




<style>
body{
    background-color :#f4f4f4;
    font-size : 16px;
}

.color{
    color:red;
}

.navbar{
    border-radius : 0;
    margin-bottom: 0 ;
}
.navbar-link{
    font-size :1em;

}

.navbar-light .navbar-nav .active>.nav-link, 
 .navbar-light .navbar-nav .nav-link.active, 
 .navbar-light .navbar-nav .nav-link.show, 
 .navbar-light .navbar-nav .show>.nav-link ,
 .dropdown-item{
    background-color: #12CBC4;
}

.dropdown-item{
    /* background-color: #12CBC4; */

}
.dropdown-menu{
min-width : 180px;
padding:0 ;
font-size:1em;
border : none ;

}
h1{
color:#777;
margin :20px;
font-size:65px;
font-weight:bold;
font-family: 'IBM Plex Serif', serif;

}


.form-group-lg .form-control {
	padding-left: 45px;
}




custom-alert{
	display:none;
}

show-pass{
position :absolute;

}
.main-table{
	vertical-align: middle !important;
	box-shadow : 0 5px 15px #ccc ;
	-webkit-box-shadow : 0 5px 15px #ccc ;
	-moz-box-shadow : 0 5px 15px #ccc ;

}
.main-table tr:first-chold td{ /* you can sue thead  */
	background-color: #999 !important;
	 color :#fff ;
     text-align :center ;
}
.main-table .btn{
	padding: 10px 3px;
}
</style>







