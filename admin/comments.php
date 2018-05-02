<?php ob_start(); ?>





<?php

//Add Edit Delete comment

session_start();
if(isset($_SESSION['Username'] )){
       // echo 'Welcome ' . $_SESSION['Username'] ;

             $pageTitle ='Comments';
              include 'init.php';


//اهم سطر 
$do =isset($_GET['do']) ? $_GET['do'] : 'Manage';


      if($do == 'Manage'){   


        $stmt = $con->prepare("SELECT
                                    *
                                    , items.Name  AS  Item_Name
                                    , users.Username AS  Member
                               FROM 
                                      comments
                               INNER JOIN
                                     items
                               ON 
                                     items.Item_ID = comments.item_id
                                     INNER JOIN
                                     users
                               ON 
                                     users.UserID = comments.user_id
                                     ORDER BY 

                                     c_id  DESC

                               ");
  
$stmt->execute();
//  جلب البيانتا
$rows =$stmt->fetchALL();
  // ظ هل يوجد بيانات 

  
  
  
  
  ?>
 <h1 class="text-center">Manage Comments</h1>
 <div class="container">
 <?php
 if(!empty($rows)){
?>
 <table class="table table-responsive table-hover  table-dark  main-table">
  <thead>
    <tr>
     <th scope="col">ID</th>
      <th scope="col">Comment</th>
      <th scope="col">Item Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Added Date</th>
      <th scope="col">Control</th>
    </tr>
  </thead>
  <tbody>
  <?php    
  foreach($rows as $row){
      echo"<tr>"  ;
      echo"<td>"  . $row['c_id'] . "</td>";
      
      echo"<td>"  . $row['comment'] . "</td>";
      echo"<td>"  . $row['Item_Name'] . "</td>";

      echo"<td>"  .$row['Member'] . "</td>";

      echo"<td> "  .$row['comment_date'] . "</td>"  ;
      echo"<td>
      <a class='btn btn-success btn-md' href='comments.php?do=Edit&comid=".$row['c_id']."'><i class='fa fa-edit'></i>Edit</a>
     
       <a class='btn btn-danger btn-md ' href='comments.php?do=Delete&comid=".$row['c_id']."'><i class=' fa fa-close'></i>Delete</a>";
        if($row['status'] == 0){
         echo "       <a class='btn btn-info btn-md ' href='comments.php?do=Approve&comid=".$row['c_id']."'><i class=' fa fa-check'></i>Approve</a>";
          
        }
     
     echo "</td>"  ;
      echo"<tr>"  ;

  }
  
  ?>
 
   
  </tbody>
</table>
</div>



      <?php
        
    } else{
     ?>
     <div class="container">
     <div class="alert alert-info"> There is No comment  </div>

     </div>
     <?php
     }



}elseif ( $do  == 'Delete'){
  ?>  <h1 class="text-center">Delete Comment</h1>
  <?php
  
  
  
    //check if get is numaric & Get the Integer Value
    $comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0;
   
      //Select all Data Depend on this ID
      
    //Select all Data Depend on this ID
    $check = checkItem('c_id' , 'comments
    ' , $comid);
    if($check > 0){
    $stmt = $con->prepare("DELETE 
    FROM 
    comments
    WHERE 
    c_id = :zuser
       ");
  //ربط الحضف بالباراميتر
  $stmt->bindParam( ":zuser" ,$comid);
  
  $stmt->execute();
  
  echo "<div class='container'>" ;

      $theMsg = "<div class='alert alert-sucsses'> " . $stmt->rowCount() . '  Record Inserted</div>';//عدد الصفوف

      redirectHome($theMsg ,'back' );
      echo "</div>"; 
    
    }else{
    echo "<div class='container'>" ;
    $theMsg = " <div class='alert alert-danger'>This ID is not exist.</div> ";
  
    redirectHome($theMsg ,3 );
    echo "</div>";
  
    
    
  }
  
  
}elseif ( $do  == 'Edit'){




  //check if get is numaric & Get the Integer Value
	$comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0;
 
    //Select all Data Depend on this ID
    
$stmt = $con->prepare("SELECT 
* 
FROM 
comments
WHERE 
c_id = ?
   ");
// عند جلب البيانات هناك عملتين check fetch
$stmt->execute(array($comid ));//التحقق من الغيت التانية بتاع ال userid
//  جلب البيانتا
$row =$stmt->fetch();
  // ظ هل يوجد بيانات 
$count = $stmt->rowCount();//عدد الصفوف
// اذا كانت البيانات موجودة فأظهر الاعدادات 
if($count > 0){   ?>

<h1 class="text-center">Edit Comment</h1>
<div class='container'>
<form class="contact-form" action="?do=Update" method="POST" >
        <!-- Start ID Field -->


<input type="hidden" name="comid" value="<?php echo $comid ?>" />

        <!-- End ID Field -->


          <!-- Start Comment Field -->

  <div class="form-group form-group-lg ">
    <label for="exampleFormControlInput1">Comment</label>
     <textarea class="form-control" name="comment">     <?php echo$row['comment'] ?>   </textarea>  
  </div>
        <!-- End comment Field -->
             <!-- End submit Field -->

    <div class="form-group form-group-lg">
    <button type="submit" class="btn btn-primary btn-lg mb-2">Save </button>
    </div>
       <!-- End submit Field -->

</form>


</div>



<?php
  //  اذا لم تكن هناك بيانات أظهر انه لا يوجد بيانات
}else{
  echo "<div class='container'>" ;
  $theMsg = " <div class='alert alert-danger'>thers is no sush id.</div> ";

  $theMsg = "thers is no sush id";
  redirectHome($theMsg  );
  echo "</div>";

}










}elseif ( $do  == 'Update'){
?>  
<h1 class="text-center">Update Comment</h1>


<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
// get the variable from the form (name=  )
  $comid =$_POST['comid'];
  $comment =$_POST['comment'];

 
 $stmt = $con->prepare("UPDATE comments SET  comment = ? WHERE c_id = ?");

// عند جلب البيانات هناك عملتين check fetch
$stmt->execute(array(  $comment ,$comid));//التحقق من الغيت التانية بتاع ال userid
// $row =$stmt->fetch();

echo "<div class='container'>" ;

$theMsg = "<div class='alert alert-sucsses'> " . $stmt->rowCount() . "  Record Updateted</div>";//عدد الصفوف
    redirectHome($theMsg ,'back' ,4 );
   echo "</div>";
  
}else{

  echo "<div class='container'>" ;

  $theMsg = " <div class='alert alert-danger'>Sorry you can not   Browse This page Directly .</div> ";

  redirectHome($theMsg );
  echo "</div>";
}

?>


  
  
  
  <?php










}elseif($do == 'Approve'){
  ?>  
 <h1 class="text-center">Approve Comment</h1>
 
 
 <?php


   //check if get is numaric & Get the Integer Value
   $comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0;
   
   //Select all Data Depend on this ID
   
 //Select all Data Depend on this ID
 $check = checkItem('c_id' , 'comments' , $comid);
 if($check > 0){
 $stmt = $con->prepare("UPDATE 

 comments
SET
status =1
WHERE
 c_id= ?
    ");
//ربط الحضف بالباراميتر
$stmt->execute(array($comid));


echo "<div class='container'>" ;

   $theMsg = "<div class='alert alert-sucsses'> " . $stmt->rowCount() . '  Record Approved</div>';//عدد الصفوف

   redirectHome($theMsg ,'back' );
   echo "</div>";  }else{
 echo "<div class='container'>" ;
 $theMsg = " <div class='alert alert-danger'>This ID is not exist.</div> ";

 redirectHome($theMsg ,'back' );
 echo "</div>";

 
 
}

}

include $tpl . "footer.php";

}else {
  header('Location: index.php');
  exit();
}
?>
 <?php ob_end_flush(); ?> 
