<?php
session_start();
$uid = $_SESSION["userid"];

include("connection.php");

if($_POST["method"]=="addinterests"){
	
	$tags = $_POST["tags"];
	
	if(!empty($tags)){
		$out = implode(",",$tags);
		
		mysqli_query($connect,"UPDATE user SET interests='$out' WHERE id='$uid'");
		
		echo "Interests successfully updated";
		
	} else {
		echo "You have no selection!";	
	}
	
}
?>