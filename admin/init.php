<?php

// $(arrayName) = array(
// 	'' => ,
// 	'' => ,
// 	'' => ,
// );
// foreach (glob('inc/*.css') as $file) {
// 	echo "<link rel='stylesheet href='"  . $file "' > ";
// }


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

    <!-- jquery -->
	<!-- <script src="js/jquery.js"></script>   -->

<!-- <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script> -->


                            <!-- confirm jquery
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script> -->



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
a{
	text-decoration : none ;
}


/* //End members pages page */
.red{
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


/* //End members pages page */




/* //Start Dashboard page */
.home-stats .stat {
	background-color : #EEE ;
	padding : 20px ;
    font-size : 15px ;
	position:relative;
	 overflow:hidden;
    }
	.home-stats .stat i{
		font-size:68px;
		top: 40px;
	}
	.home-stats .stat  .info{
     float :right;

	}
.home-stats .stat span{
	display : block;
	font-size : 55px ;
	color : white;
}

.home-stats .stat a{
	color :#FFF ;
	font-size : 50px ;

}
.home-stats .st-members{
	background-color :   #3498db  ;
	border-radius: 20px ;
}

.home-stats .st-pending{
	background-color :  #e67e22   ;
	border-radius: 20px ;

 }

.home-stats .st-items{
	background-color :   #f1c40f  ;
	border-radius: 20px ;

}

.home-stats .st-comments{
	background-color : #9b59b6   ;
	border-radius: 20px ;

}




.latest{
	margin-top : 30px ;   
}
.latest .toggle-info{
color:#888;
cursor:pointer;
 }
 
.latest .toggle-info:hover{
color:#333;
 }
.padding{
	margine:10px 10px;
}

.comments{
background-color:#888;
float:left;

}
.nice-massage{
	padding:48px;
	background-color: #FFF;

}


/* //End Dashboard page */
/* //start  categories page */
.categories .cat:last-of-type ~ hr{
	display:none:
}
.categories .cat{
	padding:  ;
	position:  relative;
	overflow: hidden ;
}

.categories .cat:hover{
background-color: #EEE;
}

.categories .cat:hover .hidden-buttons {
  right : 30px ;
}

.categories .cat .hidden-buttons {
       -webkit-transition: all .5s ease-in-out;
	   
       -moz-transition: all .5s ease-in-out;
	   
       transition: all .5s ease-in-out;
	   position: absolute ;

	   top : 10px ;
	   right : -140px ;
 


 }

.categories .cat .hidden-buttons a{
	 margin-right : 5px ;

}

 .hidden-buttons{
	-webkit-animation: jump 1.5s ease 0s infinite normal ;
       animation: jump 1.5s ease 0s infinite normal ;
}



.categories .option:click .active{
color : #00c2ff ; 
font-weight : bold ;
}
.categories .cat h2{
  color  :#6A6A6A;
}
.categories .cat .full-view p{

}
.categories   .panel-heading{
  color:	#959595 ;
  font-weight : bold ;

}
/* //End categories page */


</style>







