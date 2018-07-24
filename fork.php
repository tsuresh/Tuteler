<?php

session_start();
$uid = $_SESSION["userid"];

include("connection.php");

$id = (int)$_GET["id"];

$dataquery = mysqli_query($connect,"SELECT* FROM problems WHERE id='$id'");
$data = mysqli_fetch_array($dataquery);
$rows = mysqli_num_rows($dataquery);

if($rows == 1){
	
	$id = $data["id"];
	$title = $data["title"];
	$description = mysqli_real_escape_string($connect,$data["description"]);
	$category = $data["category"];
	$refs = $data["references"];
	
	mysqli_query($connect,"INSERT INTO `tuteler`.`problems` (`id`, `uid`, `title`, `description`, `category`, `references`, `forkid`, `datetime`) VALUES (NULL, '$uid', '$title', '$description', '$category', '$refs', '$id', NOW());");
	
	header("Location: profile.php");
	
} else {
	die("Invalid Post");	
}

?>