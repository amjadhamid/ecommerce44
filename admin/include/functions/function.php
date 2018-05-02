<?php
// echo'function is here';

// Title echo The page title if ti have $pageTitle variable
// and echo Default for other pages


// redirect function [accept parameters] v2.0
// $theMsg [error | success | ]
//$second
// $url 

if (!function_exists('redirectHome')) {
 

  
	function redirectHome($theMsg, $url = null, $seconds = 3) {
		if ($url === null) {
			$url = 'index.php';
			$link = 'Homepage';
		} else {
			if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {
				$url = $_SERVER['HTTP_REFERER'];
				$link = 'Previous Page';
			} else {
				$url = 'index.php';
				$link = 'Homepage';
			}
		}
		echo $theMsg;
		echo "<div class='alert alert-info'>You Will Be Redirected to $link After $seconds Seconds.</div>";
		header("refresh:$seconds;url=$url");
		exit();
	}
    }

//It is very clear from the error your function is defined twice hence you are getting the error.
  // v1.0
//I would recommend that check if the function is already defined before declaring it.
if (!function_exists('getTitle')){

 function  getTitle(){
    global $pageTitle;
if (isset($pageTitle)){
     echo $pageTitle;
}else {
    echo 'Default';
}
 }
};




/* Check Item function v1.0
**Function to check Item In Database [function accept parameters]
** $select = The Item to select [ user , Item , catogory]
**$from = The table To select From [ users , Items , catogries]
**$value  = The Value of select  [ Osama , Boxs , electronice]
**

*/



if (!function_exists('checkItem')) {
function  checkItem($select ,$from , $value ){
// Here you must put the con globel Like PageNmae
global $con ;
// prepare the statment
$statment = $con->prepare("SELECT $select FROM $from WHERE $select  = ?");
// execute the value
$statment->execute(array($value));
// put the numper of row in varuble
$count=$statment->rowCount();
// return the value because we need to put if statment in the code
return $count ;

}
};


/* Check The number of Items function v1.0
**Function to check Item In Database [function accept parameters]
** $item = The Item to select [ user , Item , catogory]
**$table = The table To select From [ users , Items , catogries]
**

*/


function countItems ($Item , $table){

global $con;

$stmt3 = $con->prepare("SELECT COUNT($Item) FROM $table");

$stmt3->execute();

return $stmt3->fetchColumn();

}


	/*
	** Get Latest Records Function v1.0
	** Function To Get Latest Items From Database [ Users, Items, Comments ]
	** $select = Field To Select
	** $table = The Table To Choose From
	** $order = The Desc Ordering
	** $limit = Number Of Records To Get
	*/
	function getLatest($select, $table, $order, $limit = 5) {
		global $con;
		$getStmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");
		$getStmt->execute();
		$rows = $getStmt->fetchAll();
		return $rows;
	}