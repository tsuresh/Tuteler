<?php include("includes/dashheader.php") ?>

<?php
include("connection.php");

$uid = $_SESSION["userid"];

//get points based on facourites
$points = 0;
$level = "";

$favpoints = mysqli_query($connect,"SELECT f.id, u.fullname FROM user AS u, favourites AS f, problems AS p WHERE u.id='$uid' AND p.uid=u.id AND f.postid=p.id AND f.favuser <> '$uid'");
$favptrows = mysqli_num_rows($favpoints);
$favdata = mysqli_fetch_array($favpoints);

$points = $points + ($favptrows * 10);

if($points < 500){
	$level = "Beginner";
} else if($points < 1000){
	$level = "Intermediate";
} else if($points < 5000){
	$level = "Advanced";
} else if($points > 5000){
	$level = "Expert";
}

?>


<div class="card">
  <div class="card-header">
   <h4><?php echo $favdata["fullname"] ?></h4>
  </div>
  <div class="card-body">
  	<table width="100%">
    	<tr>
        	<td>
            	<h4 class="card-title">POINTS:- <?php echo $points ?></h4>
    			<h4 class="card-title">LEVEL:- <?php echo $level ?></h4>
            </td>
            <td width="10%">
            	<img src="img/dummy.png" alt="" style="width:100px;"/>
            </td>
        </tr>
    </table>
  </div>
</div>

<h4>FORKED PROBLEMS</h4>

<?php
$forkedq = mysqli_query($connect,"SELECT LEFT(description, 300) AS description, title, category, id FROM problems WHERE uid='$uid' AND forkid <> '0'");

while($data = mysqli_fetch_array($forkedq)){
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
            <a href="unlike.php?id=<?php echo $data["id"] ?>&callback=profile" class="btn btn-primary">Unlike</a>
            <?php
			} else {
			?>
            <a href="favourite.php?id=<?php echo $data["id"] ?>&callback=profile" class="btn btn-primary">Favourite</a>
            <?php
			}
			?>
            <a href="#" class="btn btn-primary">Share</a>
            <a href="delete.php?id=<?php echo $data["id"] ?>&callback=profile" class="btn btn-primary">Delete Problem</a>
          </div>
</div>

<?php
}
?>
<hr/>
<h4 style="margin-top:35px;">MY PROBLEMS</h4>

<?php
$forkedq = mysqli_query($connect,"SELECT LEFT(description, 300) AS description, title, category, id FROM problems WHERE uid='$uid' AND forkid = '0'");

while($data = mysqli_fetch_array($forkedq)){
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
            <a href="unlike.php?id=<?php echo $data["id"] ?>&callback=profile" class="btn btn-primary">Unlike</a>
            <?php
			} else {
			?>
            <a href="favourite.php?id=<?php echo $data["id"] ?>&callback=profile" class="btn btn-primary">Favourite</a>
            <?php
			}
			?>
            <a href="#" class="btn btn-primary">Share</a>
            <a href="delete.php?id=<?php echo $data["id"] ?>&callback=profile" class="btn btn-primary">Delete Problem</a>
          </div>
</div>

<?php
}
?>


<?php include("includes/dashfooter.php") ?>