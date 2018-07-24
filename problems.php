<?php include("includes/dashheader.php") ?>

<div class="probsearch">
<h2>Filter Problems</h2>

<form action="#" method="get">
<table width="100%">
<tr>
	<td>

    <select class="form-control" name="prb_cat">
        <option value="">All</option>
    	<option value="aerospace">Aerospace industry</option>
        <option value="agriculture">Agriculture (see also Agribusiness)</option>
        <option value="chemical">Chemical industry</option>
        <option value="computers">Computer industry</option>
        <option value="construction">Construction industry</option>
        <option value="defense">Defense industry</option>
        <option value="education">Education industry</option>
        <option value="energy">Energy industry</option>
        <option value="entertainment">Entertainment industry</option>
        <option value="financial">Financial services industry</option>
        <option value="food">Food industry</option>
        <option value="health">Health care industry</option>
        <option value="hospitality">Hospitality industry</option>
        <option value="information">Information industry</option>
        <option value="manufacturing">Manufacturing</option>
        <option value="media">Mass media</option>
        <option value="telco">Telecommunications industry</option>
        <option value="transport">Transport industry</option>
        <option value="water">Water industry</option>
    </select>
    
    </td>
    <td>
    
    <div class="input-group">
          <input type="text" name="prb_search" class="form-control" placeholder="Search for..." aria-label="Search for...">
          <span class="input-group-btn">
            <button name="prb_scbtn" class="btn btn-secondary" type="submit">Go!</button>
          </span>
     </div>
    
    </td>
</tr>
</table>
</form>

<?php
include("connection.php");

if(!empty($_GET["prb_search"])){
	
	$search = $_GET["prb_search"];
	$search = mysqli_real_escape_string($connect,$search);
	
	if(empty($_GET["prb_cat"])){
		$query = mysqli_query($connect,"SELECT LEFT(description, 300) AS description, title, category, id FROM problems WHERE description LIKE '%$search%' ORDER BY id DESC");
	} else {
		$category = $_GET["prb_cat"];
		$category = mysqli_real_escape_string($connect,$category);
		$query = mysqli_query($connect,"SELECT LEFT(description, 300) AS description, title, category, id FROM problems WHERE category='$category' AND description LIKE '%$search%' ORDER BY id DESC");	
	}
	
} else {
	
	if(empty($_GET["prb_cat"])){
		$query = mysqli_query($connect,"SELECT LEFT(description, 300) AS description, title, category, id FROM problems ORDER BY id DESC");	
	} else {
		$category = $_GET["prb_cat"];
		$category = mysqli_real_escape_string($connect,$category);
		$query = mysqli_query($connect,"SELECT LEFT(description, 300) AS description, title, category, id FROM problems WHERE category='$category' ORDER BY id DESC");	
	}
	
}

?>

</div>

<h2>Problems</h2>

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
            $likecountq = mysqli_query($connect,"SELECT id FROM favourites WHERE postid='".$data['id']."'");
            $rows = mysqli_num_rows($likecountq);

			$likeq = mysqli_query($connect,"SELECT id FROM favourites WHERE postid='".$data['id']."' AND favuser='$uid';");
			$lirows = mysqli_num_rows($likeq);
			if($lirows != 0){
			?>
            <a href="unlike.php?id=<?php echo $data["id"] ?>&callback=problems" style="background-color:#a20042;border-color:#a20042;" class="btn btn-primary"><?php echo '('.$rows.')' ?> Favourite</a>
            <?php
			} else {
			?>
            <a href="favourite.php?id=<?php echo $data["id"] ?>&callback=problems" class="btn btn-primary"><?php echo '('.$rows.')' ?> Favourite</a>
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

<?php include("includes/dashfooter.php") ?>