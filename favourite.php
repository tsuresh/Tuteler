<?php

session_start();
$uid = $_SESSION["userid"];

include("connection.php");

$callback = $_GET["callback"];
$id = (int)$_GET["id"];

$dataquery = mysqli_query($connect,"SELECT id FROM problems WHERE id='$id'");
$rows = mysqli_num_rows($dataquery);

if($rows == 1){
	
	mysqli_query($connect,"INSERT INTO `favourites` (`id`, `postid`, `favuser`, `datetime`) VALUES (NULL, '$id', '$uid', NOW());");
	
	header("Location: ".$callback.".php");
	
} else {
	die("Invalid Post");	
}

?>