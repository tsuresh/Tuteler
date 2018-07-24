<?php include('includes/fancyheader.php'); ?>

<?php
include('connection.php');

$errors = "";
$success = "";

$fullname = "";
$username = "";
$phone = "";
$acctype = "";

if(isset($_POST["sup_submit"])){
	
	$fullname = $_POST["sup_fname"];
	$username = $_POST["sup_username"];
	$password = $_POST["sup_password"];
	$phone = $_POST["sup_phone"];
	$acctype = $_POST["sup_acctype"];
	
	if(!empty($fullname) && !empty($username) && !empty($password) && !empty($phone) && !empty($acctype)){
		
		//secure inputs
		$fullname = mysqli_real_escape_string($connect,$fullname);
		$username = mysqli_real_escape_string($connect,$username);
		$phone = mysqli_real_escape_string($connect,$phone);
		$acctype = mysqli_real_escape_string($connect,$acctype);
		
		if(strlen($password) >= 8){
			
			$password = md5($password);
			
			//validate email
			if(filter_var($username,FILTER_VALIDATE_EMAIL)){
				
				//check for username availability
				$query = mysqli_query($connect,"SELECT id FROM user WHERE email='$username'");
				$rows = mysqli_num_rows($query);
				
				if($rows == 0){
					
					$errors = "";
					$success = "You have been successfully signed up! Please <a href='login.php'>login</a> to continue";
					
					mysqli_query($connect,"INSERT INTO `user` (`id`, `fullname`, `email`, `password`, `verified`, `acctype`) VALUES (NULL, '$fullname', '$username', '$password', '0', '$acctype');");
					
					$fullname = "";
					$username = "";
					$phone = "";
					
				} else {
					
					$errors = "Username already taken!";	
				}
				
			} else {
				$errors = "Incorrect email!";	
			}
			
		} else {
			$errors = "Your password has to contacin at least 8 characters!";	
		}
		
	} else {
		$errors = "All fields are required!";	
	}
	
}
?>

<div class="centerboxsmall" style="height: 420px;">
	
    	<?php
		if(!empty($errors)){
		?>
        <div class="alert alert-danger" role="alert">
          <?php echo $errors ?>
        </div>
        <?php
		}
		?>
        
        <?php
		if(!empty($success)){
		?>
        <div class="alert alert-success" role="alert">
          <?php echo $success ?>
        </div>
        <?php
		}
		?>
    
    <img src="img/logo.png" style="width: 300px;"/>
 
	<form action="#" method="post">
    	<input placeholder="Full Name" required type="text" class="form-control" name="sup_fname" value="<?php echo $fullname ?>"/>
        
    	<input placeholder="Username" required type="email" class="form-control" name="sup_username" value="<?php echo $username ?>"/>
        
        <input placeholder="Phone number" required type="text" class="form-control" name="sup_phone" value="<?php echo $phone ?>"/>
        
        <select name="sup_acctype" required class="form-control" style="padding:inherit;">
        	<option value="student">Student</option>
            <option value="teacher">Teacher</option>
            <option value="company">Company</option>
            <option value="individual">Individual</option>
        </select>
        
        <input placeholder="Password" required type="password" class="form-control" name="sup_password"/>
        
        <input value="CREATE ACCOUNT" type="submit" class="btn btn-warning" name="sup_submit"/>
        
        <a href="login.php">Already have an account? SignIn</a>
    </form>
</div>


<?php include('includes/fancyfooter.php'); ?>