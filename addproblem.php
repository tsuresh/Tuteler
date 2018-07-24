<?php 
include("includes/dashheader.php");
include("connection.php");

$errors = "";

$title = "";
$dsc = "";
$cat = "";
$refs = "";

if( isset($_POST["prb_submit"]) ){
	
	$title = $_POST["prb_title"];
	$dsc = $_POST["prb_dsc"];
	$cat = $_POST["prb_cat"];
	$refs = $_POST["prb_refs"];
	
	if(!empty($title) && !empty($dsc) && !empty($cat)){
		
		$title = mysqli_real_escape_string($connect,$title);
		$dsc = mysqli_real_escape_string($connect,$dsc);
		$cat = mysqli_real_escape_string($connect,$cat);
		$refs = mysqli_real_escape_string($connect,$refs);
				
		mysqli_query($connect,"INSERT INTO `tuteler`.`problems` (`id`, `uid`, `title`, `description`, `category`, `datetime`, `references`) VALUES (NULL, '$uid', '$title', '$dsc', '$cat', NOW(), '$refs');");
		
		$title = "";
		$dsc = "";
		$cat = "";
		$refs = "";
		
		$errors = '<div class="alert alert-success" role="alert">Your problem has been successfully posted!</div>';
		
	} else {
		
		$errors = '<div class="alert alert-danger" role="alert">All fields are required!</div>';
		
	}
}
?>

<h1>Submit a Problem</h1>

<form action="#" method="post">

  <div class="form-group">
    <label for="prb_title">Problem Title</label>
    <input type="text" class="form-control" name="prb_title" placeholder="Problem Title">
  </div>
  
  <div class="form-group">
    <label for="prb_dsc">Problem Description</label>
    <textarea rows="4" class="form-control" name="prb_dsc" placeholder="Problem Description"></textarea>
  </div>
  
  <div class="form-group">
    <label for="prb_refs">Problem References</label>
    <textarea class="form-control" name="prb_refs" placeholder="Problem References"></textarea>
  </div>
  
  <div class="form-group">
    <label for="prb_cat">Problem Category</label>
    <select class="form-control" name="prb_cat">
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
  </div>
  
  <button name="prb_submit" type="submit" class="btn btn-primary">Submit Problem</button>
  
  <?php if(!empty($errors)){ echo '<p>'.$errors.'</p>'; } ?>
  
</form>

<?php include("includes/dashfooter.php") ?>