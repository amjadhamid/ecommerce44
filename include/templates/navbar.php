<!--  -->
<!-- $categories = getCat();
foreach ($categories as $key ) {
	echo $key['Name'];
} -->

<nav class="navbar navbar-expand-lg  bg-light">
  <div class="collapse navbar-collapse" >
       <li class="nav-item ">
        <a class="nav-link " href="index.php">Home page <span class="sr-only">(current)</span></a>
      </li>
    <ul class="nav navbar-nav navbar-right nav justify-content-end">
    <?php
  $categories = getCat();
  foreach ($categories as $key ) {
    
     
  ?>
      <li class="nav-item">
        <a class="nav-link " href="Categories.php?pageid=<?php echo $key['ID'] ?>&pagename=<?php echo str_replace(' ','-', $key['Name']) ?>"><?php echo $key['Name'] ?></a>
      </li>

     <?php } ?> 
      <!-- <li class="nav-item">
        <a class="nav-link " href="Items.php"><?php echo lang('Items') ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="comments.php"><?php echo lang('Comments') ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="members.php"><?php echo lang('Members') ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#"><?php echo lang('Statistics') ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#"><?php echo lang('Logs') ?></a>
      </li> -->


  
      <!-- <li class="nav-item float-right">
      <a class="nav-link " href="members.php?do=Edit&userid=<?php echo $_SESSION['ID'] ?>">Edit profile</a>
      </li>
      <li class="nav-item float-right">
      <a class="nav-link" href="#">Setting</a>
      </li>
      <li class="nav-item float-right">
      <a class="nav-link right" href="logout.php">logout</a>
      </li> -->

    </ul>
  </div>
</nav>



