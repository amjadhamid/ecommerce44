<?php ob_start(); ?>

<?php
session_start();
if(isset($_SESSION['Username'] )){
  // echo 'Welcome ' . $_SESSION['Username'] ;

  $pageTitle ='Dashboard';

include 'init.php';

// Start Dashboard Page





?>


<div class=" home-stats ">
 <div class="container  text-center">
  <h1 > Dashpoard </h1>
  <div class="row">
    <div class="col-md-3 ">
      <div class="stat st-members"> 
      <i class="fa fa-users"></i>
         <div class="info">
           Total Members 
          <span ><a href="members.php" ><?php echo countItems('UserID', 'users') ?> </a> </span>
        </div>
      </div>
    </div>
    <div class="col-md-3" >
         <div class="stat st-pending">
         <i class="fa fa-user-plus"></i>
         <div class="info"> Panding Members 
         <span > <a href="pending.php"><?php echo checkItem("RegStatus" , "users" , 0) ?></a> </span>
      </div>  
     </div>
    </div>
    <div class="col-md-3">
       <div class="stat st-items">
       <i class="fa fa-tag"></i>
         <div class="info">
        Total Items
        <span ><a href="Items.php" ><?php echo countItems('Item_ID', 'Items') ?> </a> </span>
        </div>
    </div>   
   </div>
    <div class="col-md-3">
     <div class="stat st-comments">
         <i class="fa fa-comments"></i>
         <div class="info"> Total Comments
          <span > <a href="comments.php"><?php echo countItems("c_id" , "comments" ) ?></a> </span>
       </span> 
        </div>  
       </div>
    </div>
  </div>
 </div>

<div class=" latest">
  <div class="container ">
  <div class="row">
    <div class="col-sm-6">
           <div class="panel panel-default">
           <?php $latestUsers=5 ;?>
           <div class="panel-heading">
           <i class="fa fa-users"></i>  latest  <?php echo $latestUsers ?> Register Users 
          <span class="pull-right toggle-info">
               <i class="fa fa-plus fa-lg"></i>
          </span>
           </div>
          <div class="panel-body">
            <?php
            $last =   getLatest('*' ,'users' , 'Username' , $latestUsers);

            ?>
            <table class="table table-responsive table-hover  table-active  main-table">
            <thead>
              <tr>
               <th scope="col">Username</th>
                <th scope="col">Controll</th>
             </tr>
            </thead>
            <tbody>
            <?php
           if(!empty($last)){
            foreach ($last as $key) { 
             echo"<tr>"  ;
              echo"<td>"  . $key['Username'] . "</td>";
       

              echo"<td>
              <a class='btn btn-success btn-md' href='members.php?do=Edit&userid=".$key['UserID']."'><i class='fa fa-edit'></i>Edit</a>
             
               <a class='btn btn-danger btn-md ' href='members.php?do=Delete&userid=".$key['UserID']."'><i class=' fa fa-close'></i>Delete</a>";
                if($key['RegStatus'] == 0){
                 echo "       <a class='btn btn-info btn-md ' href='members.php?do=Activate&userid=".$key['UserID']."'><i class=' fa fa-close'></i>Activate</a>";
                  
                }

                echo "</td>"  ;
                echo"<tr>"  ;
        
            }
          }else{
            ?>
            <div class="container">
            <div class="alert alert-info nice-massege"> There\s No Members to Show  </div>
            </div>
            <?php          }
            ?>

   </tbody>
   </table>


          </div>
        </div>
      </div>
   <div class="col-sm-6">
    <div class="panel panel-default">
           <?php $latestItems=5 ;?>
           <div class="panel-heading">
           <i class="fa fa-item"></i>  latest  <?php echo $latestItems ?> Register Users 
           <span class="pull-right toggle-info">
               <i class="fa fa-plus fa-lg"></i>
          </span>
           </div>
          <div class="panel-body">
            <?php
            $lastitem =   getLatest('*' ,'items' , 'Name' , $latestItems);

            ?>
            <table class="table table-responsive table-hover  table-active  main-table">
            <thead>
              <tr>
               <th scope="col">Name</th>
                <th scope="col">Controll</th>
             </tr>
            </thead>
            <tbody>
            <?php
            if(!empty($lastitem)){
            foreach ($lastitem as $item) { 
             echo"<tr>"  ;
              echo"<td>"  . $item['Name'] . "</td>";
       

              echo"<td>
              <a class='btn btn-success btn-md' href='items.php?do=Edit&itemid=".$item['Item_ID']."'><i class='fa fa-edit'></i>Edit</a>
             
               <a class='btn btn-danger btn-md ' href='items.php?do=Delete&itemid=".$item['Item_ID']."'><i class=' fa fa-close'></i>Delete</a>";
               if($item['Approve'] == 0){
                echo "     
                  <a class='btn btn-info btn-md ' 
                  href='Items.php?do=Approve&itemid=".$item['Item_ID']."'>
                  <i class=' fa fa-check'></i>Approve</a>";
                             }

                echo "</td>"  ;
                echo"<tr>"  ;
        
            }
           } else{
              ?>
              <div class="container">
              <div class="alert alert-info nice_massage"> There is No Item to Show  </div>
              </div>
              <?php
              }
            ?>

   </tbody>
  </table>
  </div>
        </div>   
       </div>
    </div>
  </div>
  
</div>
<div class=" latest">
  <div class="container ">
  <div class="row">
    <div class="col-sm-6">
           <div class="panel panel-default">
           <?php $latestcomm=5 ;?>
           <div class="panel-heading">
           <i class="fa fa-comment"></i>  latest <?php echo $latestcomm ?> Comments 
          <span class="pull-right toggle-info">
               <i class="fa fa-plus fa-lg"></i>
          </span>
           </div>
          <div class="panel-body">
            <?php
      $stmt = $con->prepare("SELECT
         comments.*
        , users.Username AS  Member
   FROM 
          comments

         INNER JOIN
         users
   ON 
         users.UserID = comments.user_id
         ORDER BY 
          c_id  DESC
         LIMIT $latestcomm
   ");


$stmt->execute();
//  جلب البيانتا
$rows =$stmt->fetchALL();
if(!empty($rows)){
foreach($rows as $comment)

            ?>
       <div class="media">
<span> <a href="comments.php"> <?php echo $comment['Member'] ?>   <br> </span>
<hr><br>
  <div class=" comments">
  <p>
    <?php echo $comment['comment'] ?>
  </p>
       </div>
</div>
<?php
} else{
              ?>
              <div class="container">
              <div class="alert alert-info nice_massage"> There No comment to Show  </div>
              </div>
              <?php
              }

              ?>
          </div>
        </div>
      </div>
    </div>   
     
  </div>
  
</div>


</div>
<?php












// End Dashboard page
include $tpl . "footer.php";

}else {
  header('Location: index.php');
  exit();
}
?>
<?php ob_end_flush(); ?> 



