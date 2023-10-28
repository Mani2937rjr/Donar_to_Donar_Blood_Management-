<!DOCTYPE html>
<?php
session_start();
include("config.php");
?>
<html lang="en">

<head>

	<?php include("head.php");?>

</head>

<body>

<?php include("top_nav.php"); ?>

    

<?php

if(isset($_POST['signup'])){
	$name      = $_POST['name'];
	$email     = $_POST['email'];
	$password  = $_POST['password'];
	$confirm   = $_POST['confirm'];
	$reg       = "/^[a-zA-Z ]+$/";
	
	$errors    = array();
	if(empty($name)){
		$errors['name_error'] = "Name is required";
	} else if(!preg_match($reg, $name)){
		$errors['name_error'] = "Only Characters are allowed";
		$name = "";
	}

	if(empty($email))
	{
		$errors['email_error'] = "Email is required!";
	}else
	{
		$Email_check = $con->query("SELECT email FROM login WHERE email = '$email'");
		if($Email_check->num_rows >1)
		{

			$errors['email_error'] = "Sorry this email is already exist";
			$email = "";
		}
		else
		{
			
		}
	}
	if(empty($password))
	{
		$errors['password_error'] = "Password is required";
	}
	else if(strlen($password) < 6)
	{
		$errors['password_error'] = "Your password is too short";
		$password = "";
	}
	if(empty($confirm))
	{
		$errors['confirm_error'] = "Confirm password is required";
	}
	else if($confirm != $password)
	{
		$errors['confirm_error'] = "Please confirm your password!";
		$confirm = "";
	}
	if(!empty($name) && !empty($email) && !empty($password) && !empty($confirm))
	{
		
		$Query = $con->query("INSERT INTO login (name,email,password) VALUES ('$name','$email','$password')");
		if($Query)
		{
			header("location:log.php?signup_success='Your acccount is successfully created!'");
		}
		else
		{
			echo "<script>alert('Sorry query not work')</script>";
		}
		
	}

}

 ?>

<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login and Registration Form </title>
    <link rel="stylesheet" href="css/user/regst.css">
    <!-- Fontawesome CDN Link -->
    <script src="https://kit.fontawesome.com/cdd3068599.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   </head>
<body>
	
	
</div>
  <div class="container">
    <div class="signup-form">
          <div class="title">SIGNUP</div>
		  <div class="form-group">
        <form action="" method= "POST">
							<?php 
                            if(isset($errors)): ?>
                            <?php foreach($errors as $error_show): ?>
                            	<ul>
                            		<li id="res" style="color:black">
									<?php echo $error_show; ?></li>
                            	</ul>
                            <?php endforeach; ?>
                        <?php endif; ?>
							</div>
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="text" name="confirm" placeholder="confirm your password" required>
              </div>
	
              
              
              
              
              

              <div class="button input-box">
                <input type="submit" name="signup" value="Sumbit">
              </div>
              <div class="text sign-up-text">Already have an account? <a href ="log.php">Login now</a></div>
			  
            </div>
      </form>
      
    </div>
    </div>
    </div>
  </div>
</body>
</html>


        <!-- Footer -->
       <?php include"footer.php";?>
  
        </div>
      
  
</body>

</html>
