<?php
session_start();
$uid = isset($_SESSION["userid"]);		
?>
        
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tuteler</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css"/>
<script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="overlaytop"></div>
<div class="overlaybottom"></div>

<nav class="navbar navbar-expand-lg navbar-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="problems.php">Problems</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="projects.php">Hosted Projects</a>
      </li>
    </ul>
    
    <ul class="navbar-nav my-2 my-lg-0">
      <li class="nav-item">
      	<?php
		if(empty($uid)){
		?>
        	<a class="btn btn-outline-warning" href="login.php">My Account</a>
        <?php	
		} else {
		?>	
        	<a class="btn btn-outline-warning" href="logout.php">Logout</a>
        <?php
		}
		?>
      </li>
    </ul>

</nav>