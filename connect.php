<?php
// $hostname="localhost";
// $username ="root";
// $password ="";
// $dbname = "employees";

// define("HOSTNAME", "localhost");
// define("HOST_USER", "root");
// define("HOST_PASS", "");
// define("DB_NAME", "shop");


// $conn = mysqli_connect(HOSTNAME ,HOST_USER , HOST_PASS ,DB_NAME);

// if (!$conn) {
//     die("connected failed:".mysqli_connect_error() . "Error NO" .mysqli_connect_errno());;
// }else {
 
// //   just to know if it worked  
//     // echo "Connected";

// }


$dsn = "mysql:host=localhost;dbname=shop";
$user = 'root';
$pass = '';
$option = array(

    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try{
$con = new PDO ($dsn , $user , $pass ,$option);
$con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
}

catch(PDOExcrption $e){
     echo 'failed' . $e->getMassage();
}