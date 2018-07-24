<?php include("includes/dashheader.php") ?>


<a href="problems.php">Back to Problem List</a>

<?php
include("connection.php");

$id = (int)$_GET["id"];

$query = mysqli_query($connect,"SELECT* FROM problems WHERE id='$id'");
$data = mysqli_fetch_array($query);
$rows = mysqli_num_rows($query);

if($rows == 0){
	echo "<h1>The requested page cannot be found!</h1>";
} else {
?>
<h1><?php echo $data["title"] ?></h1>
<p><?php echo $data["description"] ?></p>

<div style="border:1px solid #c5c5c5;border-radius:5px;padding:15px;margin-bottom:10px;">
<h3>Contributions by other users</h3>
<?php

$refquery = mysqli_query($connect,"SELECT r.desc, u.fullname FROM `resources` AS r, `user` AS u WHERE r.pid='$id' AND u.id=r.uid ORDER BY datetime DESC LIMIT 3");
while($refdata = mysqli_fetch_array($refquery)){
	echo "<p><b>".$refdata["fullname"]."</b><br/>".$refdata["desc"]."<br/></br/><a href='upvote.php' class='btn btn-primary'>Found this useful</a></p>";	
}

?>
</div>

<div style="border:1px solid #c5c5c5;border-radius:5px;padding:15px;">
<form action="#" method="post">
    <h3>Contribute to the issue</h3>
    <div class="form-group">
        <label for="prb_refs">Add knowledge, links, resources...</label>
        <textarea class="form-control" name="less_refs" placeholder="Lesson References"></textarea>
    </div>
    <button name="less_submit" type="submit" class="btn btn-primary">Submit Reference</button>
</form>
<?php
if(isset($_POST["less_submit"])){
	
	$refname = $_POST["less_refs"];
	
	if(!empty($refname)){
		$refname = mysqli_real_escape_string($connect,$refname);
		
		mysqli_query($connect,"INSERT INTO `resources` (`id`, `pid`, `uid`, `desc`, `datetime`) VALUES (NULL, '$id', '$uid', '$refname', NOW());");
		
	}
	
}
?>
</div>

<?php	
}
?>

<?php include("includes/dashfooter.php") ?>