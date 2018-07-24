<?php include("includes/dashheader.php") ?>
<?php
include("connection.php");

$userq = mysqli_query($connect,"SELECT interests FROM user WHERE id='$uid'");
$ud = mysqli_fetch_array($userq);
$interests = $ud["interests"];

$query = mysqli_query($connect,"SELECT LEFT(description, 300) AS description, title, category, id FROM problems ORDER BY id DESC");
?>

<h2>Problems</h2>

<?php
if(!empty($interests)){
$intarray = explode(",",$interests);

while($data = mysqli_fetch_array($query)){
	if(in_array($data["category"],$intarray)){
?>


<div class="card">
          <div class="card-header">
            <?php echo $data["category"] ?>
          </div>
          <div class="card-body">
            <h4 class="card-title"><?php echo $data["title"] ?></h4>
            <p class="card-text"><?php echo $data["description"] ?>...<br/>
            <a href="viewprob.php?id=<?php echo $data["id"] ?>">Read More</a></p>
         	<?php
			$likeq = mysqli_query($connect,"SELECT id FROM favourites WHERE postid='".$data['id']."' AND favuser='$uid';");
			$lirows = mysqli_num_rows($likeq);
			if($lirows != 0){
			?>
            <a href="unlike.php?id=<?php echo $data["id"] ?>&callback=problems" class="btn btn-primary">Unlike</a>
            <?php
			} else {
			?>
            <a href="favourite.php?id=<?php echo $data["id"] ?>&callback=problems" class="btn btn-primary">Favourite</a>
            <?php
			}
			?>
            <a href="#" class="btn btn-primary">Share</a>
            
            <a href="fork.php?id=<?php echo $data["id"] ?>" class="btn btn-primary">Fork Problem</a>
          </div>
</div>

<?php
	}
}
} else {
?>

<?php
while($data = mysqli_fetch_array($query)){
?>
<div class="card">
          <div class="card-header">
            <?php echo $data["category"] ?>
          </div>
          <div class="card-body">
            <h4 class="card-title"><?php echo $data["title"] ?></h4>
            <p class="card-text"><?php echo $data["description"] ?>...<br/>
            <a href="viewprob.php?id=<?php echo $data["id"] ?>">Read More</a></p>
         	<?php
			$likeq = mysqli_query($connect,"SELECT id FROM favourites WHERE postid='".$data['id']."' AND favuser='$uid';");
			$lirows = mysqli_num_rows($likeq);
			if($lirows != 0){
			?>
            <a href="unlike.php?id=<?php echo $data["id"] ?>&callback=problems" class="btn btn-primary">Unlike</a>
            <?php
			} else {
			?>
            <a href="favourite.php?id=<?php echo $data["id"] ?>&callback=problems" class="btn btn-primary">Favourite</a>
            <?php
			}
			?>
            <a href="#" class="btn btn-primary">Share</a>
            
            <a href="fork.php?id=<?php echo $data["id"] ?>" class="btn btn-primary">Fork Problem</a>
          </div>
</div>
<?php
	}
	?>

<?php } ?>

<?php include("includes/dashfooter.php") ?>