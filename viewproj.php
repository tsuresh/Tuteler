<?php include("includes/dashheader.php") ?>


<a href="projects.php">Back to Project List</a>

<?php
include("connection.php");

$id = (int)$_GET["id"];

$query = mysqli_query($connect,"SELECT p.title, p.solution, p.time, p.cost, p.team, u.fullname, pbm.title AS prtitle, p.pid FROM projects AS p, user AS u, problems AS pbm WHERE p.id='$id' AND u.id=p.uid AND pbm.id=p.pid;");
$data = mysqli_fetch_array($query);
$rows = mysqli_num_rows($query);

if($rows == 0){
	echo "<h1>The requested page cannot be found!</h1>";
} else {
?>
<h1><?php echo $data["title"] ?></h1>
<p><?php echo $data["solution"] ?></p>

<div style="border:1px solid #c5c5c5;border-radius:5px;padding:15px;margin-bottom:10px;">
<?php
echo "<p><b>Related Problem: </b><br/><a href='viewprob.php?id=".$data["pid"]."'>".$data["prtitle"]."</a></p>";
echo "<p><b>Estimated Time: </b><br/>".$data["time"]."</p>";	
echo "<p><b>Cost Structure Time: </b><br/>".$data["cost"]."</p>";	
echo "<p><b>Team Leader: </b><br/>".$data["fullname"]."</p>";	
?>
</div>

<div style="border:1px solid #c5c5c5;border-radius:5px;padding:15px;margin-bottom:10px;">
<h3>Team members</h3>
<?php

$mememails = explode(",",$data["team"]);

foreach($mememails as $mememail){
	$checkdb = mysqli_query($connect,"SELECT fullname, email FROM user WHERE email='$mememail'");
	$userexist = mysqli_num_rows($checkdb);
	
	if($userexist == 1){
		$userdata = mysqli_fetch_array($checkdb);
		echo "<p><b>".$userdata["fullname"]."</b><br/>".$userdata["email"]."</p>";	
	}
}

?>
</div>

<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-552bdff47497f2bb"></script> 

<?php	
}
?>

<?php include("includes/dashfooter.php") ?>