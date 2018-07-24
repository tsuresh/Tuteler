<?php include('includes/fancyheader.php'); ?>

<?php
include('connection.php');

$errors = "";

if(isset($_POST["log_submit"])){
	
	$username = $_POST["log_username"];
	$password = $_POST["log_password"];
	
	if(!empty($username) && !empty($password)){
		
		$username = mysqli_real_escape_string($connect,$username);
		$password = md5($password);
		
		$query = mysqli_query($connect,"SELECT id FROM user WHERE email='$username' AND password='$password'");
		$rows = mysqli_num_rows($query);
		
		if($rows == 1){
			
			$data = mysqli_fetch_array($query);
			$uid = $data["id"];
			
			$_SESSION["userid"] = $uid;
			
			header("Location: dashboard.php");
			
		} else {
			
			$errors = "Incorrect username/password";
			
		}
		
	} else {
		
		$errors = "Username and password cannot be empty!";	
		
	}
	
}
?>

<div class="centerboxsmall" style="height: 265px;">
	<img src="img/logo.png" style="width: 300px;"/>
	<form action="#" method="post">
    	<input placeholder="Username" required type="email" class="form-control" name="log_username"/>
        
        <input placeholder="Password" required type="password" class="form-control" name="log_password"/>
        
        <input value="SIGN IN" type="submit" class="btn btn-warning" name="log_submit"/>
        
        <a href="register.php">Don't have an account? SignUp</a>
        
        <?php
		if(!empty($errors)){
		?>
        <div class="alert alert-danger" role="alert">
          <?php echo $errors ?>
        </div>
        <?php
		}
		?>
        
    </form>
</div>


<?php include('includes/fancyfooter.php'); ?>