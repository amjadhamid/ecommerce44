<!--  -->


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?php echo  $_SESSION['Username'] ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse"  data-target="#app-nav" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="app-nav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link " href="dashboard.php"><?php echo lang('Admin') ?> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="Categories.php"><?php echo lang('Categories') ?></a>
      </li>
      <li class="nav-item">
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
      </li>


     <li class="nav-item float-right">
      <a class="nav-link" href="../index.php">Visit shop</a>
      </li>
      <li class="nav-item float-right">
      <a class="nav-link " href="members.php?do=Edit&userid=<?php echo $_SESSION['ID'] ?>">Edit profile</a>
      </li>
      <li class="nav-item float-right">
      <a class="nav-link" href="#">Setting</a>
      </li>
      <li class="nav-item float-right">
      <a class="nav-link" href="logout.php">logout</a>
      </li>

    


    </ul>
  </div>
</nav>



