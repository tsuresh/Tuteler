<?php
session_start();
$uid = $_SESSION["userid"];
if(empty($uid)){
	header("Location: login.php");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tuteler</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/dash.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background:#563d7c !important;">
  <a class="navbar-brand" href="index.php"><img src="img/logo.png" width="100px"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">My Wall</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="problems.php">Problem Explorer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">My Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="projects.php">All Projects</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="host.php">Host Project</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
    <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="asidecontainer">
      	<h2>Quick Access</h2>
        <a style="display:inline-block;width:150px;margin-bottom:8px;" class="btn btn-warning" href="addproblem.php" role="button">Add new problem</a>
        <a style="display:inline-block;width:150px;margin-bottom:8px;" class="btn btn-warning" href="host.php" role="button">Host a Project</a>
        <a style="display:inline-block;width:150px;margin-bottom:8px;" class="btn btn-warning" href="addinterests.php" role="button">Add Interests</a>
      </div>
      
      <div class="asidecontainer">
      	<h2>Featured Topics</h2>
        <a href="problems.php?prb_cat=health&prb_search=">Health Care</a> 
        <a href="problems.php?prb_cat=computers&prb_search=">Computer Industry</a> 
        <a href="problems.php?prb_cat=education&prb_search=">Education Industry</a> 
        <a href="problems.php?prb_cat=telco&prb_search=">Telecommunication</a></div>
    </div>
    
    <div class="col-9">