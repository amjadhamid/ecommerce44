<?php ob_start(); ?>





<?php

//Add Edit Delete Member

session_start();
if(isset($_SESSION['Username'] )){
       // echo 'Welcome ' . $_SESSION['Username'] ;

             $pageTitle ='Members';
              include 'init.php';


//اهم سطر 
$do =isset($_GET['do']) ? $_GET['do'] : 'Manage';


      if($do == 'Manage'){   

// failed
        // $query = '';
        // if (isset($_GET['page']) && $_GET['page'] == 'Pending') {
        //   $query = "AND RegStatus = 0";
        // }
        // Select All Users Except Admin 
        $stmt = $con->prepare("SELECT * FROM users WHERE GroupID != 1   ORDER BY 

        UserID  DESC ");
  
// عند جلب البيانات هناك عملتين check fetch
$stmt->execute();//التحقق من الغيت التانية بتاع ال userid
//  جلب البيانتا
$rows =$stmt->fetchALL();
  // ظ هل يوجد بيانات 

  
  
  if(!empty($rows)){

  
  ?>
 <h1 class="text-center">Manage Member</h1>
 <div class="container">
 <table class="table table-responsive table-hover  table-dark  main-table">
  <thead>
    <tr>
     <th scope="col">#ID</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Full Name</th>
      <th scope="col">Register Date</th>
      <th scope="col">Control</th>
    </tr>
  </thead>
  <tbody>
  <?php    
  foreach($rows as $row){
      echo"<tr>"  ;
      echo"<td>"  . $row['UserID'] . "</td>";
      
      echo"<td>"  . $row['Username'] . "</td>";
      echo"<td>"  . $row['Email'] . "</td>";

      echo"<td>"  .$row['Fullname'] . "</td>";

      echo"<td> "  .$row['Date'] . "</td>"  ;
      echo"<td>
      <a class='btn btn-success btn-md' href='members.php?do=Edit&userid=".$row['UserID']."'><i class='fa fa-edit'></i>Edit</a>
     
       <a class='btn btn-danger btn-md ' href='members.php?do=Delete&userid=".$row['UserID']."'><i class=' fa fa-close'></i>Delete</a>";
        if($row['RegStatus'] == 0){
         echo "       <a class='btn btn-info btn-md ' href='members.php?do=Activate&userid=".$row['UserID']."'><i class=' fa fa-check'></i>Activate</a>";
          
        }
     
     echo "</td>"  ;
      echo"<tr>"  ;

  }
  
  ?>
 
   
  </tbody>
</table>
   <a href="members.php?do=Add" class="btn btn-primary"><h3><i class="fa fa-plus"></i>New Member</h3></a>
</div>

<?php
//for empty
}else{
?>
<div class="container">
<div class="alert alert-info"> There is No Members to Manage  </div>
<a href="members.php?do=Add" class="btn btn-primary"><h3><i class="fa fa-plus"></i>New Member</h3></a>

</div>
<?php
}




}elseif ( $do  == 'Delete'){
 
  
  
    //check if get is numaric & Get the Integer Value
    $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
   
      //Select all Data Depend on this ID
      
    //Select all Data Depend on this ID
    $check = checkItem('userid' , 'users' , $userid);
    if($check > 0){
    $stmt = $con->prepare("DELETE 
    FROM 
    users
    WHERE 
    UserID = :zuser
       ");
  //ربط الحضف بالباراميتر
  $stmt->bindParam( ":zuser" ,$userid);
  
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
	$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
 
    //Select all Data Depend on this ID
    
$stmt = $con->prepare("SELECT 
* 
FROM 
users
WHERE 
UserID = ?
LIMIT 1
   ");
// عند جلب البيانات هناك عملتين check fetch
$stmt->execute(array($userid ));//التحقق من الغيت التانية بتاع ال userid
//  جلب البيانتا
$row =$stmt->fetch();
  // ظ هل يوجد بيانات 
$count = $stmt->rowCount();//عدد الصفوف
// اذا كانت البيانات موجودة فأظهر الاعدادات 
if(isset($stmt)){ 
if($count > 0){   ?>

<h1 class="text-center">Edit Member</h1>
<div class='container'>
<form class="contact-form" action="?do=Update" method="POST" >
<input type="hidden" name="userid" value="<?php echo $userid ?>" />
  <div class="form-group form-group-lg ">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" name="email" class="form-control" value="<?php echo$row['Email'] ?>" placeholder="name@example.com" required="required">
  </div>
  <div class="form-group form-group-lg ">
    <label for="exampleFormControlInput1">User Name</label>
    <input type="name" name="Username" class="form-control" autocomplete="off" value="<?php echo$row['Username'] ?>" placeholder="Usernaem"required="required">
  
  </div>
  
  <div class="form-group form-group-lg ">
    <label for="exampleFormControlInput1">Full name</label>
    <input type="name" name="full" class="form-control" value="<?php echo$row['Fullname'] ?>" placeholder="Name" required="required">
  </div>
  
  <div class="form-group form-group-lg ">
    <label for="exampleFormControlInput1">Password</label>
    <input type="Password"  name="newpassword" class="form-control" autocomplete="new-password" placeholder="leave lank if you do nnot need to change">
    <input type="hidden" name="oldpassword" value="<?php echo $row['Password'] ?>" />

  </div>
  <div class="form-group form-group-lg">
  <button type="submit" class="btn btn-primary btn-lg mb-2">Save</button>
  </div>
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
}









}elseif ( $do  == 'Update'){
?>  
<h1 class="text-center">Update Member</h1>


<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
// get the variable from the form (name=  )
  $id =$_POST['userid'];
  $email =$_POST['email'];
  $name =$_POST['Username'];
  $full =$_POST['full'];
 $Pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : sha1($_POST['newpassword']);
 
 
 
 // Validate The form
 $formErrors = array();

 if(empty($name)){
  $formErrors[] ='  
  user name can be <strong> empty</strong> ';
 }
 if(empty($email)){
  $formErrors[] =' 
  email can be <strong> empty</strong>';
}
if(empty($full)){
  $formErrors[] ='
  user fullname can be <strong> empty</strong>';
}
if (strlen($name) <4){
  $formErrors[] = ' 
  Username Must be lest than <strong> 4</strong> Characters';
}
if (strlen($name) >20){
  $formErrors[] = ' 
  Username Must be largest than <strong> 20</strong> Characters';
}

?>
<?php   if(! empty($formErrors)){   

// to do not dublicate another user like a user in database
//           <<<<<<<<<<<<<<<<<<<< UserId != ? >>>>>>>>>>>>>>>>>>>

$stmt2 = $con->prepare("SELECT  
                            *
                        FROM 
                             users 
                        WHERE
                              Username = ? 
                        AND 
                            UserID !=?  
                             ");

$stmt2->execute(array($name , $userid));
$count = $stmt2->rowCount();
if($count == 1){
  echo " <div class='alert alert-danger'>Sorry This user is exist .</div> ";

  redirectHome($theMsg  , 'back');
}else{

  foreach ($formErrors as $error) {
    echo '<div class="alert alert-danger alert-dismissible" role="start">'. $error . '</div><br/>';
  }
?>  
  

<!-- close the div -->
</div>
<!-- close the if -->
<?php } }  ?>




<?php
//check if there is no error
if( empty($formErrors)){

 $stmt = $con->prepare("UPDATE users SET  Email = ?, Username = ?, Fullname = ? , Password = ? WHERE UserID = ?");

// عند جلب البيانات هناك عملتين check fetch
$stmt->execute(array(  $email ,$name , $full ,$pass ,$id));//التحقق من الغيت التانية بتاع ال userid
// $row =$stmt->fetch();

echo "<div class='container'>" ;

$theMsg = "<div class='alert alert-sucsses'> " . $stmt->rowCount() . "  Record Updateted</div>";//عدد الصفوف
    redirectHome($theMsg ,'back' ,4 );
   echo "</div>";
  }
}else{

  echo "<div class='container'>" ;

  $theMsg = " <div class='alert alert-danger'>Sorry you can not   Browse This page Directly .</div> ";

  redirectHome($theMsg );
  echo "</div>";
}

?>


  
  
  
  <?php


}elseif ( $do  == 'Add'){ ?>
  <h1 class="text-center">Add New Member</h1>
  <div class='container'>
  <form class="contact-form" action="?do=Insert" method="POST" >
    <div class="form-group form-group-lg ">
      <label for="exampleFormControlInput1">Email address</label>
      <input type="email" name="email" class="form-control"  placeholder="Email Must be valid" required="required">
    </div>
    <div class="form-group form-group-lg ">
      <label for="exampleFormControlInput1">User Name</label>
      <input type="name" name="Username" class="form-control" autocomplete="off"  placeholder="Username To Login to shop" required="required">
    
    </div>
    
    <div class="form-group form-group-lg ">
      <label for="exampleFormControlInput1">Full name</label>
      <input type="name" name="full" class="form-control"  placeholder="Full name Appear in your Profile Page" required="required">
    </div>
    
    <div class="form-group form-group-lg ">
      <label for="exampleFormControlInput1">Password</label>
      <input type="Password"  name="password" class="password form-control" autocomplete="new-password" placeholder="Password Must Be Hard Complex"  required="required">
      <!-- <i class="show-pass fa fa-eye fa-2x"></i>  -->
    </div>
    
    <div class="form-group form-group-lg">
    <button type="submit" class="btn btn-primary btn-lg mb-2">Add Member</button>
    </div>
  </form>
  
  
  </div>
  
  <?php











}elseif($do == 'Activate'){
  ?>  
 <h1 class="text-center">Activate Member</h1>
 
 
 <?php


   //check if get is numaric & Get the Integer Value
   $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
   
   //Select all Data Depend on this ID
   
 //Select all Data Depend on this ID
 $check = checkItem('userid' , 'users' , $userid);
 if($check > 0){
 $stmt = $con->prepare("UPDATE 

 users
SET
RegStatus =1
WHERE
 UserID = ?
    ");
//ربط الحضف بالباراميتر
$stmt->execute(array($userid));


echo "<div class='container'>" ;

   $theMsg = "<div class='alert alert-sucsses'> " . $stmt->rowCount() . '  Record Activted</div>';//عدد الصفوف

   redirectHome($theMsg ,'back' );
   echo "</div>";  }else{
 echo "<div class='container'>" ;
 $theMsg = " <div class='alert alert-danger'>This ID is not exist.</div> ";

 redirectHome($theMsg ,3 );
 echo "</div>";

 
 
}




}elseif ( $do  == 'Insert'){

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
  echo ' <h1 class="text-center">Insert New Member</h1>'  ;
  $email =$_POST['email'];
  $password =$_POST['password'];
 $name =$_POST['Username'];
  $full =$_POST['full'];
  $password =$_POST['password'];
   // WHICH WIIL GO TO THE DATABASE 
  $hashPass = sha1($_POST['password']);
   
   // Validate The form
   $formErrors = array();
  
   if(empty($name)){
    $formErrors[] ='  
    user name can not be <strong> empty</strong> ';
   }
   if(empty($email)){
    $formErrors[] =' 
    email can not be <strong> empty</strong>';
  }
  if(empty($password)){
    $formErrors[] =' 
    password can not be <strong> empty</strong>';
  }
  if(empty($full)){
    $formErrors[] ='
    user fullname can not be <strong> empty</strong>';
  }
  if (strlen($name) <4){
    $formErrors[] = ' 
    Username Must be lest than <strong> 4</strong> Characters';
  }
  if (strlen($name) >20){
    $formErrors[] = ' 
    Username Must be largest than <strong> 20</strong> Characters';
  }
  // if(strlen($password) <0){
  //   $passError = 'The password must be larger than <strong> 5</strong> Characters';
  //  }
  ?>
  <?php   if(! empty($formErrors)){   


    foreach ($formErrors as $error) {
      echo '<div class="alert alert-danger alert-dismissible" role="start">' . $error . '</div><br/>';
    }
  ?>  
    
  
  <!-- close the div -->
  </div>
  <!-- close the if -->
  <?php  }  ?>
  
  
  
  
  <?php
  //check if there is no error
  if( empty($formErrors)){
// check if the usernamre in database [ $value == $user {from the post }]
$check = checkItem("Username" , "users" , $name);
if ($check == 1){
  echo "<div class='container'>" ;

  $theMsg = " <div class='alert alert-danger'>Sorry This user Is Exist</div> ";

  redirectHome($theMsg ,'back' );
  echo "</div>";
}else{
    //another way

    // in the insert you must take all what you want 
   $stmt = $con->prepare("INSERT INTO 
                        users (  Email , Username , Fullname  , Password ,RegStatus  , Date )
                        VALUES (? ,?,?,? , 1, now())
                         ");
  
  // عند جلب البيانات هناك عملتين check fetch
  $stmt->execute(array(  
    $email ,
    $name , 
     $full ,
    $password,
   ));//التحقق من الغيت التانية بتاع ال userid
  // $row =$stmt->fetch();
  echo "<div class='container'>" ;

      $theMsg = "<div class='alert alert-sucsses'> " . $stmt->rowCount() . '  Record Inserted</div>';//عدد الصفوف

      redirectHome($theMsg ,'back' );
      echo "</div>";
  }
  }
  }else{
    echo "<div class='container'>" ;
    $theMsg = " <div class='alert alert-danger'>Sorry you can not   Browse This page Directly .</div> ";

    redirectHome($theMsg  );
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
