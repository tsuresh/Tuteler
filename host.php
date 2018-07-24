<?php 
include("includes/dashheader.php");
?>

<h1>Host a Solution</h1>

<?php
include("connection.php");

$errors = "";

if(isset($_POST["prb_submit"])){
	
	$prjtitle = $_POST["prj_title"];
	$prjdsc = $_POST["prj_dsc"];
	$prjtime = $_POST["prj_time"];
	$prjcost = $_POST["prj_cost"];
	$prpbm = $_POST["prj_pbm"];
	$prteam = $_POST["prj_team"];
	
	if(!empty($prjtitle) && !empty($prjdsc) && !empty($prjtime) && !empty($prjcost) && !empty($prpbm)){
		
		$prjtitle = mysqli_real_escape_string($connect,$prjtitle);
		$prjdsc = mysqli_real_escape_string($connect,$prjdsc);
		$prjtime = mysqli_real_escape_string($connect,$prjtime);
		$prjcost = mysqli_real_escape_string($connect,$prjcost);
		$prpbm = mysqli_real_escape_string($connect,$prpbm);
		$prteam = mysqli_real_escape_string($connect,$prteam);
		
		mysqli_query($connect,"INSERT INTO `projects` (`id`, `uid`, `title`, `solution`, `time`, `cost`, `pid`, `team`, `datetime`) VALUES (NULL, '$uid', '$prjtitle', '$prjdsc', '$prjtime', '$prjcost', '$prpbm', '$prteam', NOW());");
		
		$errors = '<div class="alert alert-success" role="alert">Your project has been successfully hosted.</div>';
		
	} else {
		$errors = '<div class="alert alert-danger" role="alert">All fields are required</div>';
	}
	
}

$probq = mysqli_query($connect,"SELECT id, title FROM problems WHERE forkid='0'");
?>

<form action="#" method="post">

  <?php if(!empty($errors)){ echo '<p>'.$errors.'</p>'; } ?>

  <div class="form-group">
    <label for="prj_title">Project Title</label>
    <input type="text" class="form-control" name="prj_title" placeholder="Project Title">
  </div>
  
  <div class="form-group">
    <label for="prj_dsc">Your Solution</label>
    <textarea rows="4" class="form-control" name="prj_dsc" placeholder="Your Solution"></textarea>
  </div>
  
  <div class="form-group">
    <label for="prj_time">Estimated Time Period</label>
    <textarea class="form-control" name="prj_time" placeholder="Estimated Time Period"></textarea>
  </div>
  
  <div class="form-group">
    <label for="prj_cost">Cost Allocation</label>
    <input type="text" class="form-control" name="prj_cost" placeholder="Cost Allocation">
  </div>
  
  <div class="form-group">
    <label for="prj_team">Team members' emails (Comma Seperated)</label>
    <textarea class="form-control" name="prj_team" placeholder="Team members' emails (Comma Seperated)"></textarea>
  </div>
  
  <div class="form-group">
    <label for="prj_pbm">Select Problem</label>
    <select class="form-control" name="prj_pbm">
    	<?php
		while($probd = mysqli_fetch_array($probq)){
		?>
        <option value="<?php echo $probd["id"] ?>"><?php echo $probd["title"] ?></option>
        <?php
		}
		?>
    </select>
  </div>
  
  <button name="prb_submit" type="submit" class="btn btn-primary">Host your solution</button>
  
</form>


<?php include("includes/dashfooter.php") ?>