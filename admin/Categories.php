<?php ob_start(); ?>

<?php
session_start();
  // echo 'Welcome ' . $_SESSION['Username'] ;

  $pageTitle ='Categories';


// Start Categorise Page



if(isset($_SESSION['Username'])){
  
        include 'init.php';
        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage' ;

        if( $do == 'Manage'){

            $sort = 'ASC';
            // 
            $sort_array = array( 'ASC' , 'DESC');
              if( isset($_GET['sort']) && in_array( $_GET['sort'] , $sort_array ) ){
                  $sort = $_GET['sort'];
              }

            $stmt2 = $con->prepare("SELECT * FROM categories ORDER BY Ordering $sort");
        $stmt2->execute();
        $cats = $stmt2->fetchAll(); ?>
       <h1 class="text-center">Manage Categories</h1>  
       
       
       <?php
       if(!empty($cats)){
       
       
       ?>
       <div class="container categories">
         <div class="panel panel-default">
            <div class="panel-heading">
            <i class="fa fa-edit"></i>
            Manage Categories :
              <div class="option pull-right">
              <i class="fa fa-sort"></i>ORDARING :
                <a href="Categories.php?sort=ASC"
                 class="badge badge-secondary  <?php if ($sort == 'ASC') echo 'active'; ?>  ">
                 ASC 
                 </a>
                <a href="Categories.php?sort=DESC"
                 class="badge badge-secondary <?php if ($sort == 'DESC') echo 'active'; ?>  ">
                 DESC
                 </a>
                 <!-- <i class="fa fa-eye"></i>VIEW :
              <a 
                 class="badge badge-secondary   ">
                 Full 
              </a>
              <a 
                 class="badge badge-secondary    ">
                 Classic 
             </a> -->
              </div>
            </div>
            <div class="panel-body">
            <?php
               foreach ($cats as $cat) {
                   echo "<div class='cat'>";
                   //    The buttons
                       echo "<div class='hidden-buttons'>";
                       echo "  <a class='btn btn-success btn-md' 
                       href='Categories.php?do=Edit&catid=".$cat['ID']."'>
                       <i class='fa fa-edit'></i>Edit</a>
                       ";
                       echo "  <a class='btn btn-danger btn-md confirm '
                        href='Categories.php?do=Delete&catid=".$cat['ID']."'>
                        <i class=' fa fa-close'></i>Delete</a>
                       ";
                       echo "</div> ";
                   //   Name
                   echo"<h2>"  . $cat['Name'] . "</h2>";
                   // div full view
                  echo " <div class='full-view'> " ;

                   //    Description
                   if($cat['Description'] == '')
                   {
                       echo'Description Is Empty' . "<br/>" ;
                   }else{
                    echo'Description Is ' . $cat['Visibality'] . "<br/>" ;
 
                   }
   
                   //   Ordering
                   echo 'Ordering Is :' . $cat['Ordering'] . "<br/>" ;
                   if($cat['Visibality'] == 1){echo '<a href="#" class="badge badge-danger">
                    <i class="fa fa-eye"></i> Hidden</a>
                    ' ;}
                   //  Allow_Comment
                   if($cat['Allow_Comment'] == 1){echo '<a href="#" class="badge badge-primary">
                    <i class="fa fa-close"></i>Commint disaple</a>
                    ';}

                    //  Allow_ads
                   if($cat['Allow_ads'] == 1){echo '<a href="#" class="badge badge-info">
                    <i class="fa fa-close"></i>Commint disaple</a>
                    ';}
                  // end the div full view
                  echo " </div> ";
                    echo "</div>";
                   echo "<hr>";

              
               }
          ?>
            
            </div>
          </div>
            <a class='btn btn-info btn-md  '
             href='Categories.php?do=Add'>
              <i class=' fa fa-plus'></i>Add New Categories</a>
                     
        </div>


        <?php
  } else{
    ?>
    <div class="container">
    <div class="alert alert-info"> There is No Item to Manage  </div>
    <a href="Categories.php?do=Add" class="btn btn-primary"><h3><i class="fa fa-plus"></i>New Category</h3></a>

    </div>
    <?php
    }









  } elseif  (  $do == 'Add') {
    ?>
  <h1 class="text-center">Add New Categorise</h1>
  <div class='container'>
  <form class="contact-form" action="?do=Insert" method="POST" >
       <!-- Start Name Field -->
    <div class="form-group form-group-lg ">
    <label for="exampleFormControlInput1">Name</label>
      <input type="name" name="name" class="form-control" autocomplete="off"
        placeholder="Name Of The Categorise" required="required">
      </div>
      <!-- End Name Field -->


      <!-- Start Name Description -->

    <div class="form-group form-group-lg ">
      <label for="exampleFormControlInput1">Description</label>
      <input type="text" name="Description" class="form-control" 
       placeholder="Describe The Category" >
    </div>
       <!-- End Name Description -->
     <!-- Start Name Ordering -->

    <div class="form-group form-group-lg ">
      <label for="exampleFormControlInput1">Ordering</label>
      <input type="text" name="Ordering" class="form-control" 
       placeholder="Number of Ordering" >
    </div>
       <!-- End Name Ordering -->
    <!-- Start Name Visible -->

    <div class="form-group form-group-lg ">
      <label for="exampleFormControlInput1">Visible</label>
         <div>
           <input id="vis-yes" type="radio" name="Visible" value="0" checked>
           <label for="vis-yes">Yes</label>
         </div>
         <div>
           <input id="vis-no" type="radio" name="Visible" value="1" >
           <label for="vis-no">No</label>
         </div>
    </div>
       <!-- End Name Visible -->
    <!-- Start Name Commenting -->

    <div class="form-group form-group-lg ">
      <label for="exampleFormControlInput1">Allow Commenting</label>
         <div>
           <input id="com-yes" type="radio" name="Commenting" value="0" checked>
           <label for="com-yes">Yes</label>
         </div>
         <div>
           <input id="com-no" type="radio" name="Commenting" value="1" >
           <label for="com-no">No</label>
         </div>
    </div>
       <!-- End Name Commenting -->
        <!-- Start Ads Field -->

    <div class="form-group form-group-lg ">
      <label for="exampleFormControlInput1">Allow Ads</label>
         <div>
           <input id="ads-yes" type="radio" name="ads" value="0" checked>
           <label for="ads-yes">Yes</label>
         </div>
         <div>
           <input id="ads-no" type="radio" name="ads" value="1" >
           <label for="ads-no">No</label>
         </div>
    </div>
       <!-- End Ads Field -->
         <!-- Start Submit Field -->
         <div class="form-group form-group-lg">
    <button type="submit" class="btn btn-primary btn-lg mb-2">
    <i class="fa fa-plus"></i>
    Add Category</button>
    </div>
  </form>
          <!-- End Submit Field -->

  
  </div>
  
  <?php










  } elseif  (  $do == 'Insert') {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo ' <h1 class="text-center">Insert New Category</h1>'  ;
        $name =$_POST['name'];
        $desc =$_POST['Description'];
        $order =$_POST['Ordering'];
        $visible =$_POST['Visible'];
        $comment =$_POST['Commenting'];
        $ads =$_POST['ads'];

        //  Validate The form
         $formErrors = array();
      
        if(empty($name)){
          $formErrors[] ='name can not be <strong> empty</strong>';
        }else{
  
      // check if the usernamre in database [ $value == $user {from the post }]
      $check = checkItem("Name" , "categories" , $name);
      if ($check == 1){
        echo "<div class='container'>" ;
      
        $theMsg = " <div class='alert alert-danger'>Sorry This catagories Is Exist</div> ";
      
        redirectHome($theMsg ,'back' );
        echo "</div>";
      }else{
      
          // in the insert you must take all what you want 
            // insert category info
         $stmt = $con->prepare("INSERT INTO 
          categories (  Name , Description , Ordering  , Visibality ,
          Allow_Comment  , Allow_ads )
          VALUES (? ,?,?,? ,?,?)
           ");
        // عند جلب البيانات هناك عملتين check fetch
        $stmt->execute(array(  
             $name , 
           $desc ,
           $order ,
           $visible ,
           $comment ,
          $ads
              ));
                  echo "<div class='container'>" ;
                 $theMsg = "<div class='alert alert-sucsses'> " . $stmt->rowCount() . '  Record Inserted</div>';//عدد الصفوف
                redirectHome($theMsg ,'back' );
                echo "</div>";
            }
              // else of validate if the name is empty
        }
            // the else of inserting the page directly
        }else{
          echo "<div class='container'>" ;
          $theMsg = " <div class='alert alert-danger'>Sorry you can not   Browse This page Directly .</div> ";
      
          redirectHome($theMsg  );
          echo "</div>";
        }
        
      
      
      
      
     
      


          
  } elseif  (  $do == 'Edit') {


  //check if get is numaric & Get the Integer Value
	$catid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;
 
    //Select all Data Depend on this ID
    
$stmt = $con->prepare("SELECT 
* 
FROM 
categories
WHERE 
ID = ?
   ");
// عند جلب البيانات هناك عملتين check fetch
$stmt->execute(array($catid ));//التحقق من الغيت التانية بتاع ال userid
//  جلب البيانتا
$cat =$stmt->fetch();
  // ظ هل يوجد بيانات 
$count = $stmt->rowCount();//عدد الصفوف
// اذا كانت البيانات موجودة فأظهر الاعدادات 
if(isset($stmt)){ 
if($count  > 0){   ?>

 <h1 class="text-center">Edit New Categorise</h1>
  <div class='container'>
  <form class="contact-form" action="?do=Update" method="POST" >
       <!-- Start ID Field \to send to the update page -->

  <input type="hidden" name="catid" value="<?php echo $catid ?>" />
       <!-- end ID Field \to send to the update page -->

       <!-- Start Name Field -->
    <div class="form-group form-group-lg ">
    <label for="exampleFormControlInput1">Name</label>
      <input type="name" name="name" class="form-control" 
        placeholder="Name Of The Categorise" required="required"
        value="<?php echo $cat['Name'] ?>"
        >
      </div>
      <!-- End Name Field -->


      <!-- Start Name Description -->

    <div class="form-group form-group-lg ">
      <label for="exampleFormControlInput1">Description</label>
      <input type="text" name="Description" class="form-control" 
       placeholder="Describe The Category" 
       value="<?php echo $cat['Description'] ?>"
  >
    </div>
       <!-- End Name Description -->
     <!-- Start Name Ordering -->

    <div class="form-group form-group-lg ">
      <label for="exampleFormControlInput1">Ordering</label>
      <input type="text" name="Ordering" class="form-control" 
       placeholder="Number of Ordering"
       value="<?php echo $cat['Ordering'] ?>"
 >
    </div>
       <!-- End Name Ordering -->
    <!-- Start Name Visible -->

    <div class="form-group form-group-lg ">
      <label for="exampleFormControlInput1">Visible</label>
         <div>
           <input id="vis-yes" type="radio" name="Visible" value="0" <?php if($cat['Visibality'] == 0) echo 'checked' ?>>
           <label for="vis-yes">Yes</label>
         </div>
         <div>
           <input id="vis-no" type="radio" name="Visible" value="1" <?php if($cat['Visibality'] == 1) echo 'checked' ?>>
           <label for="vis-no">No</label>
         </div>
    </div>
       <!-- End Name Visible -->
    <!-- Start Name Commenting -->

    <div class="form-group form-group-lg ">
      <label for="exampleFormControlInput1">Allow Commenting</label>
         <div>
           <input id="com-yes" type="radio" name="Commenting" value="0" <?php if($cat['Visibality'] == 0) echo 'checked' ?>>
           <label for="com-yes">Yes</label>
         </div>
         <div>
           <input id="com-no" type="radio" name="Commenting" value="1" <?php if($cat['Visibality'] == 1) echo 'checked' ?>>
           <label for="com-no">No</label>
         </div>
    </div>
       <!-- End Name Commenting -->
        <!-- Start Ads Field -->

    <div class="form-group form-group-lg ">
      <label for="exampleFormControlInput1">Allow Ads</label>
         <div>
           <input id="ads-yes" type="radio" name="ads" value="0" <?php if($cat['Visibality'] == 0) echo 'checked' ?>   >
           <label for="ads-yes">Yes</label>
         </div>
         <div>
           <input id="ads-no" type="radio" name="ads" value="1" <?php if($cat['Visibality'] == 1) echo 'checked' ?>   >
           <label for="ads-no">No</label>
         </div>
    </div>
       <!-- End Ads Field -->

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
}
    


  } elseif  (  $do == 'Update') {
    ?>
    <h1 class="text-center">Update Catigory</h1>

    <?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // get the variable from the form (categories)
    $catid =$_POST['catid'];
    $name =$_POST['name'];
    $desc =$_POST['Description'];
    $order =$_POST['Ordering'];
    $visible =$_POST['Visible'];
    $comment =$_POST['Commenting'];
    $ads =$_POST['ads'];
     
    // update the database with this info 
     $stmt = $con->prepare("UPDATE categories 
                           SET
       Name = ?, Description = ?, Ordering = ? , 
       Visibality = ? , Allow_Comment	 = ? , Allow_ads  = ?
                         WHERE 
                         ID = ?");
    
    // عند جلب البيانات هناك عملتين check fetch
    $stmt->execute(array( $name , $desc ,$order ,$visible ,$comment , $ads ,$catid ));//التحقق من الغيت التانية بتاع ال userid
    // $row =$stmt->fetch();
    
    echo "<div class='container'>" ;
    $link = 'categories.php';
    $theMsg = "<div class='alert alert-sucsses'> " . $stmt->rowCount() . "  Record Updateted</div>";//عدد الصفوف
        redirectHome($theMsg ,'back' ,4 );
       echo "</div>";
    
    }   else   {
    
      echo "<div class='container'>" ;
    
      $theMsg = " <div class='alert alert-danger'>Sorry you can not   Browse This page Directly .</div> ";
    
      redirectHome($theMsg );
      echo "</div>";
    }
  
  } elseif  (  $do == 'Delete') {
    ?>  <h1 class="text-center">Delete New Categories</h1>
    <?php
     //check if get is numaric & Get the Integer Value
      $catid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;
 
      //Select all Data Depend on this ID
      $check = checkItem('ID' , 'categories' , $catid);
      if($check > 0){
      $stmt = $con->prepare("DELETE 
      FROM 
      categories
      WHERE 
      ID = :zuser
         ");
    //ربط الحضف بالباراميتر
    $stmt->bindParam( ":zuser" ,$catid);
    
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
        
  } elseif  (  $do == 'Activate') {
    echo 'Activate';



  }


// End Categorise page
include $tpl . "footer.php";

}else {
  header('Location: index.php');
  exit();
}
 ob_end_flush(); ?> 
