


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
    <?php

include("top_nav.php"); 
if(isset($_POST['login']))
{
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = array();
    $sql="SELECT * FROM login WHERE email='$email' and  password='$password'";
    $result=mysqli_query($con, $sql);
    if(mysqli_num_rows($result) >0 )
    {
        $row = mysqli_fetch_array($result);
        if($row['usertype'] == "admin")
        {
            
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            header("location:admin_inbox.php");
        }
        elseif($row['usertype'] == "user")
        {
          $_SESSION['id'] = $row['id'];
          $_SESSION['email'] = $row['email'];
          header("location:index.php");
        }
        
   }
   else
        {
          echo "<script>alert('incorrect email or password')</script> ";
        }
  
}

$msg='';
?>

 

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Document</title>

    <script src="https://kit.fontawesome.com/cdd3068599.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/user/logst.css">

</head>

<body>

 

<div class="container">

   

    <div class="forms">

        <div class="form-content">

          <div class="login-form">

            <div class="title">Login</div>

          <form action="" method ="POST">

            <div class="input-boxes">

              <div class="input-box">

                <i class="fas fa-envelope"></i>
                
                <input type="email" name="email" placeholder="Enter your email" autofocus required>

              </div>

              <div class="input-box">

                <i class="fa-solid fa-lock"></i>

                <input type="password" name="password" placeholder="Enter your password" required>

              </div>

             

              <div class="button input-box">

                <input type="submit" name="login" value="Sumbit"></div>

                

               <br><br>

               <div id="result" style="color: goldenrod;"><?php echo $msg?></div>

               <br><br>

                <div class="text sign-up-text">Don't have an account? <a href = "admin.php">Sigup now</div>

               

               

               

            </div>

        </form>

      </div>

               

    </div>

  </div>

  <?php include"footer.php";?>

</body>

</html>

 

 


 

