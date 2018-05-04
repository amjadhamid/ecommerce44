<?php ob_start(); ?>

<?php
session_start();
  // echo 'Welcome ' . $_SESSION['Username'] ;

  


// Start Items Page



if(isset($_SESSION['Username'])){
  $pageTitle ='Items';
        include 'init.php';

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage' ;

        if( $do == 'Manage'){
          $stmt = $con->prepare("SELECT Items.* 
                                      , categories.Name AS category_name
                                      , users.Username
                                FROM 
                                      Items 
                                INNER JOIN
                                    categories
                                ON
                                    categories.ID = items.Cat_Id
                                INNER JOIN
                                     users
                                ON
                                    users.UserID = items.Member_ID
                               ORDER BY 
                                      Item_ID  DESC
                                  ");
  
          // عند جلب البيانات هناك عملتين check fetch
          $stmt->execute();//التحقق من الغيت التانية بتاع ال userid
          //  جلب البيانتا
          $items =$stmt->fetchALL();
            // ظ هل يوجد بيانات 
          
            if(!empty($items)){

            
            
            ?>
           <h1 class="text-center">Manage Items</h1>
           <div class="container">
           <table class="table table-responsive table-hover  table-dark  main-table">
            <thead>
              <tr>
               <th scope="col">#ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Adding Date</th>
                <th scope="col">category_name</th>
                <th scope="col">Username</th>
                <th scope="col">control</th>
              </tr>
            </thead>
            <tbody>
            <?php    
            foreach($items as $item){
                echo"<tr>"  ;
                echo"<td>"  . $item['Item_ID'] . "</td>";
                
                echo"<td>"  . $item['Name'] . "</td>";
                echo"<td>"  . $item['Description'] . "</td>";
          
                echo"<td>"  .$item['Price'] . "</td>";
          
                echo"<td> "  .$item['Add_Date'] . "</td>"  ;
                echo"<td> "  .$item['category_name'] . "</td>"  ;
                echo"<td> "  .$item['Username'] . "</td>"  ;

                echo"<td>
                <a class='btn btn-success btn-md' <a href='items.php?do=Edit&itemid=" . $item['Item_ID'] . "'><i class='fa fa-edit'></i>Edit</a>
               
                 <a class='btn btn-danger btn-md ' href='Items.php?do=Delete&itemid=".$item['Item_ID']."'><i class=' fa fa-close'></i>Delete</a>";
                 if($item['Approve'] == 0){
                  echo "     
                    <a class='btn btn-info btn-md ' 
                    href='Items.php?do=Approve&itemid=".$item['Item_ID']."'>
                    <i class=' fa fa-check'></i>Approve</a>";
               
               echo "</td>"  ;
                echo"<tr>"  ;
          
            }
          }
            ?>
           
             
            </tbody>
          </table>
             <a href="Items.php?do=Add" class="btn btn-primary"><h3><i class="fa fa-plus"></i>New Item</h3></a>
          </div>
        
          <?php
        
         } else{
          ?>
          <div class="container">
          <div class="alert alert-info"> There is No Item to Manage  </div>
          <a href="Items.php?do=Add" class="btn btn-primary"><h3><i class="fa fa-plus"></i>New Item</h3></a>

          </div>
          <?php
          }






        }elseif ($do  == 'Add') {
            ?>
  <h1 class="text-center">Add New Item</h1>
  <div class='container'>
  <form class="contact-form" action="?do=Insert" method="POST" >
       <!-- Start Name Field -->
    <div class="form-group form-group-lg ">
    <label for="exampleFormControlInput1">Name</label>
      <input type="name" 
      name="name" 
      class="form-control" 
    placeholder="Name Of The Item" 
     required="required">
      </div>
      <!-- End Name Field -->
       <!-- Start Description Field -->
       <div class="form-group form-group-lg ">
    <label for="exampleFormControlInput1">Description</label>
      <input 
        type="name"
        name="Description" 
        class="form-control" 
        placeholder="Description Of The Item"
        required="required"
        >
      </div>
      <!-- End Description Field -->

   <!-- Start Price Field -->
   <div class="form-group form-group-lg ">
    <label for="exampleFormControlInput1">Price</label>
      <input 
        type="name"
        name="Price" 
        class="form-control" 
        placeholder="Price Of The Item"
        required="required">
      </div>
      <!-- End Price Field -->

 <!-- Start Country Field -->
 <div class="form-group form-group-lg ">
    <label for="exampleFormControlInput1">Country </label>
      <input 
        type="name"
        name="Country" 
        class="form-control" 
        placeholder="Country Of Made"
        required="required">
      </div>
      <!-- <! End Country !> -->
   <script>
       $("select").selectBoxIt({

          autoWidth: false

       });
   </script>

   <!-- Start Status Field -->
   <div class="form-group form-group-lg ">
     <label for="exampleFormControlInput1">Status</label>
      <select 
      required="required"
      name="Status">
        <option value="o">... </option>
        <option value="1">New </option>
        <option value="2">Like New </option>
        <option value="3">Used </option>
        <option value="4">Very Old  </option>
      </select>
    
      </div>
      <!-- End Status Field -->
     

   <!-- Start member Field -->
   <div class="form-group form-group-lg ">
     <label for="exampleFormControlInput1" 
     required="required">Member</label>
      <select  name="Member">
       <option value="o">... </option>
       <?php
         $stmt = $con->prepare("SELECT * FROM users");
         $stmt->execute();
         $users = $stmt->fetchAll();
         foreach( $users as $user){
             echo "<option value = ' "  . $user['UserID']  .   " ' >"  
             . $user['Username']  . 
              "</option>";
         }
       ?>

      </select>
    
      </div>
      <!-- End member Field -->


   <!-- Start category Field -->
   <div class="form-group form-group-lg ">
     <label for="exampleFormControlInput1"         
     required="required"  >
              category</label>
      <select  name="category">
       <option value="o">... </option>
       <?php
         $stmt = $con->prepare("SELECT * FROM categories");
         $stmt->execute();
         $users = $stmt->fetchAll();
         foreach( $users as $user){
             echo "<option value = ' "  . $user['ID']  .   " ' >"  
             . $user['Name']  . 
              "</option>";
         }
       ?>

      </select>
    
      </div>
      <!-- End category Field -->

         <!-- Start Submit Field -->
    <div class="form-group form-group-lg">
    <button type="submit" class="btn btn-primary btn-sm">
    <i class="fa fa-plus"></i>Add Item</button>
    </div>
  </form>
        <!-- End Submit Field -->

  
  </div>
  
  <?php


        }elseif ($do  == 'Insert') { 

          if($_SERVER['REQUEST_METHOD'] == 'POST'){

          $name =$_POST['name'];
          $Description =$_POST['Description'];
          $Price =$_POST['Price'];
          $Country =$_POST['Country'];
          $Status =$_POST['Status'];
          $Member =$_POST['Member'];
          $category =$_POST['category'];

            // in the insert you must take all what you want 
           $stmt = $con->prepare("INSERT INTO 
          items (  Name , Description , Price  ,
             Country_Made ,Status ,Add_Date 
               , Cat_Id  , Member_ID
                 )
                                VALUES (? ,?,?,? ,? , now() , ? , ?)
                                 ");
          
          // عند جلب البيانات هناك عملتين check fetch
          $stmt->execute(array(  
            $name ,
            $Description , 
             $Price ,
            $Country,
            $Status,
            $Member,
            $category,
           ));//التحقق من الغيت التانية بتاع ال userid
         
                      echo "<div class='container'>" ;
                     $theMsg = "<div class='alert alert-sucsses'> " . $stmt->rowCount() . '  Record Inserted</div>';//عدد الصفوف
                    redirectHome($theMsg ,'back' );
                    echo "</div>";
             
        
                }  // the else of inserting the page directly
          
          
      

        }elseif ($do  == 'Edit') {
  //check if get is numaric & Get the Integer Value
	$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;
 
    //Select all Data Depend on this ID
    
$stmt = $con->prepare("SELECT 
* 
FROM 
items
WHERE 
Item_ID = ?
   ");
// عند جلب البيانات هناك عملتين check fetch
$stmt->execute(array($itemid ));//التحقق من الغيت التانية بتاع ال userid
//  جلب البيانتا
$item =$stmt->fetch();
  // ظ هل يوجد بيانات 
$count = $stmt->rowCount();//عدد الصفوف
// اذا كانت البيانات موجودة فأظهر الاعدادات 
if($count > 0){   ?>
           ?>
  <h1 class="text-center">Edit Item</h1>
  <div class='container'>
  <form class="contact-form" action="?do=Update" method="POST" >
       <!-- Start Name Field -->
    <div class="form-group form-group-lg ">
    <label for="exampleFormControlInput1">Name</label>
      <input type="name" 
      name="name" 
      class="form-control" 
    placeholder="Name Of The Item" 
     required="required"
     value="<?php echo $item['Name'] ?>">
      </div>
      <!-- End Name Field -->
       <!-- Start Description Field -->
       <div class="form-group form-group-lg ">
    <label for="exampleFormControlInput1">Description</label>
      <input 
        type="name"
        name="Description" 
        class="form-control" 
        placeholder="Description Of The Item"
        required="required"
        value="<?php echo $item['Description'] ?>"
        >
      </div>
      <!-- End Description Field -->

   <!-- Start Price Field -->
   <div class="form-group form-group-lg ">
    <label for="exampleFormControlInput1">Price</label>
      <input 
        type="name"
        name="Price" 
        class="form-control" 
        placeholder="Price Of The Item"
        required="required"
        value="<?php echo $item['Price'] ?>"
        >
      </div>
      <!-- End Price Field -->

 <!-- Start Country Field -->
 <div class="form-group form-group-lg ">
    <label for="exampleFormControlInput1">Country </label>
      <input 
        type="name"
        name="Country" 
        class="form-control" 
        placeholder="Country Of Made"
        required="required"
        value="<?php echo $item['Country_Made'] ?>"
        >
      </div>
      <!-- <! End Country !> -->
   <script>
       $("select").selectBoxIt({

          autoWidth: false

       });
   </script>

   <!-- Start Status Field -->
   <div class="form-group form-group-lg ">
     <label for="exampleFormControlInput1">Status</label>
      <select 
      required="required"
      name="Status">
        <option value="1" <?php if($item['Status'] == 1 ) echo 'selected'; ?>  >New </option>
        <option value="2" <?php if($item['Status'] == 2 ) echo 'selected'; ?> >Like New </option>
        <option value="3" <?php if($item['Status'] == 3 ) echo 'selected'; ?> >Used </option>
        <option value="4" <?php if($item['Status'] == 4 ) echo 'selected'; ?> >Very Old  </option>
      </select>
    
      </div>
      <!-- End Status Field -->
     

   <!-- Start member Field -->
   <div class="form-group form-group-lg ">
     <label for="exampleFormControlInput1" 
     required="required">Member</label>
      <select class="form-control" name="Member">
       <?php
         $stmt = $con->prepare("SELECT * FROM users");
         $stmt->execute();
         $users = $stmt->fetchAll();
         foreach( $users as $user){
           ?>
              
             <option value =" <?php   $user['UserID']  ?>"  <?php if($item['Member_ID'] == $user['UserID'] ) echo 'selected'?>  >  
             <?php $user['Username']  ?> 
              </option>
         <?php
         }
       ?>

      </select>
    
      </div>
      <!-- End member Field -->


   <!-- Start category Field -->
   <div class="form-group form-group-lg ">
     <label for="exampleFormControlInput1"         
     required="required"  >
              category</label>
      <select class="form-control" name="category">
       <?php
         $stmt = $con->prepare("SELECT * FROM categories");
         $stmt->execute();
         $cats = $stmt->fetchAll();
         foreach( $cats as $cat){
          ?>
              
          <option value =" <?php   $cat['ID']  ?>" 
           <?php if($item['Cat_Id'] == $cat['ID'] ) echo 'selected'?>  >  
            <?php $cat['Name']  ?> 
           </option>
      <?php
         }
       ?>

      </select>
    
      </div>
      <!-- End category Field -->

         <!-- Start Submit Field -->
    <div class="form-group form-group-lg">
    <button type="submit" class="btn btn-primary btn-sm">
    <i class="fa fa-plus"></i>Save Item</button>
    </div>
  </form>
        <!-- End Submit Field -->

<?php
//    you must delete item name and id from tables
 // and the inner join from sql
 // you need just this comments not all the comments in the site
        $stmt = $con->prepare("SELECT
                                    *
                                    , users.Username AS  Member
                               FROM 
                                      comments
                         
                                     INNER JOIN
                                     users
                               ON 
                                     users.UserID = comments.user_id
                                     WHERE item_id = ?
                               ");


$stmt->execute(array($itemid));
//  جلب البيانتا
$rows =$stmt->fetchALL();


if(!empty($rows)){
  // ظ هل يوجد بيانات 

  
  
  
  
  ?>
 <h1 class="text-center">Manage [<?php echo $item['Name'] ?>] Comments</h1>
 <table class="table table-responsive table-hover  table-dark  main-table">
  <thead>
    <tr>
      <th scope="col">Comment</th>
      <th scope="col">User Name</th>
      <th scope="col">Added Date</th>
      <th scope="col">Control</th>
    </tr>
  </thead>
  <tbody>
  <?php    
  foreach($rows as $row){
      echo"<tr>"  ;
      
      echo"<td>"  . $row['comment'] . "</td>";

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

}else{


}

  
}else{
  echo "<div class='container'>" ;
  $theMsg = " <div class='alert alert-danger'>thers is no sush id.</div> ";

  $theMsg = "thers is no sush id";
  redirectHome($theMsg  );
  echo "</div>";

}




        }elseif ($do  == 'Update') {
            

        }elseif ($do  == 'Delete') {
     
          
          
            //check if get is numaric & Get the Integer Value
            $itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;
           
              //Select all Data Depend on this ID
              
            //Select all Data Depend on this ID
            $check = checkItem('Item_ID' , 'items' , $itemid);
            if($check > 0){
            $stmt = $con->prepare("DELETE 
            FROM 
            items
            WHERE 
            Item_ID = :zuser
               ");
          //ربط الحضف بالباراميتر
          $stmt->bindParam( ":zuser" ,$itemid);
          
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
          

        }elseif ($do  == 'Approve') {
          ?>  
          <h1 class="text-center">Approve Member</h1>
          
          
          <?php
         
         
            //check if get is numaric & Get the Integer Value
            $itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;
            
            //Select all Data Depend on this ID
            
          //Select all Data Depend on this ID
          $check = checkItem('Item_ID' , 'items' , $itemid);
          if($check > 0){
          $stmt = $con->prepare("UPDATE 
         items
         SET
         Approve =1
         WHERE
         Item_ID = ?
             ");
         //ربط الحضف بالباراميتر
         $stmt->execute(array($itemid));
         
         
         echo "<div class='container'>" ;
         
            $theMsg = "<div class='alert alert-sucsses'> " . $stmt->rowCount() . '  Record Activted</div>';//عدد الصفوف
         
            redirectHome($theMsg ,'back' );
            echo "</div>";  }else{
          echo "<div class='container'>" ;
          $theMsg = " <div class='alert alert-danger'>This ID is not exist.</div> ";
         
          redirectHome($theMsg ,3 );
          echo "</div>";
            }
          
          
         

        }elseif ($do  == 'Approve') {

        }elseif ($do  == 'Approve') {

        }elseif ($do  == 'Approve') 

        
            // End  page Items
include $tpl . "footer.php";

}else {
  header('Location: index.php');
  exit();
}
 ob_end_flush(); ?> 





    