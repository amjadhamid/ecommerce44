<?php ob_start(); ?>

<?php
session_start();
if(isset($_SESSION['Username'] )){
  // echo 'Welcome ' . $_SESSION['Username'] ;

  $pageTitle ='Dashboard';

include 'init.php';

// Start Dashboard Page

      // Select All Users Except Admin 
      $stmt = $con->prepare("SELECT * FROM users WHERE GroupID != 1 AND RegStatus =0 ");
  
      // عند جلب البيانات هناك عملتين check fetch
      $stmt->execute();//التحقق من الغيت التانية بتاع ال userid
      //  جلب البيانتا
      $rows =$stmt->fetchALL();
        // ظ هل يوجد بيانات 
      
        
        
        
        
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
               echo "       <a class='btn btn-info btn-md ' href='members.php?do=Activate&userid=".$row['UserID']."'><i class=' fa fa-close'></i>Activate</a>";
                
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


// End panding page
include $tpl . "footer.php";

}else {
  header('Location: index.php');
  exit();
}
?>
<?php ob_end_flush(); ?> 

