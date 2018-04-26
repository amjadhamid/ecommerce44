<!--  -->


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?php echo  $_SESSION['Username'] ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse"  data-target="#app-nav" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="app-nav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="#"><?php echo lang('Admin') ?> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#"><?php echo lang('Categorise') ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><?php echo lang('Items') ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="members.php"><?php echo lang('Members') ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><?php echo lang('Statistics') ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><?php echo lang('Logs') ?></a>
      </li>
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo  $_SESSION['Username'] ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item " href="members.php?do=Edit&userid=<?php echo $_SESSION['ID'] ?>">Edit profile</a>
          <a class="dropdown-item" href="#">Setting</a>
          <a class="dropdown-item" href="logout.php">logout</a>
        </div>
      </li>


    </ul>
  </div>
</nav>



