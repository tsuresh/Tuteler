<?php include("includes/dashheader.php") ?>

<div class="probsearch">
<h2>Filter Projects</h2>

<form action="#" method="get">
    <div class="input-group">
          <input type="text" name="prb_search" class="form-control" placeholder="Search for..." aria-label="Search for...">
          <span class="input-group-btn">
            <button name="prb_scbtn" class="btn btn-secondary" type="submit">Go!</button>
          </span>
     </div>
</table>
</form>

<?php
include("connection.php");

if(!empty($_GET["prb_search"])){
	
	$search = $_GET["prb_search"];
	$search = mysqli_real_escape_string($connect,$search);
	
	$query = mysqli_query($connect,"SELECT LEFT(solution, 300) AS solution, title, id, time FROM projects WHERE title LIKE '%$search%' ORDER BY id DESC");
	
} else {
	$query = mysqli_query($connect,"SELECT LEFT(solution, 300) AS solution, title, id, time FROM projects ORDER BY id DESC");	
}

?>

</div>

<h2>Hosted Projects</h2>

<?php



while($data = mysqli_fetch_array($query)){
?>


<div class="card">
          <div class="card-header">
            Duration: <?php echo $data["time"] ?>
          </div>
          <div class="card-body">
            <h4 class="card-title"><?php echo $data["title"] ?></h4>
            <p class="card-text"><?php echo $data["solution"] ?>...<br/>
            <a href="viewproj.php?id=<?php echo $data["id"] ?>">Read More</a></p>
          </div>
</div>

<?php
}
?>

<?php include("includes/dashfooter.php") ?>