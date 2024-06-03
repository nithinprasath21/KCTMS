<?php
   include("database.php");
   session_start();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="stylesheet" href="loginstyle.css">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>User login</title>
      <script type="text/javascript">
         window.history.forward();
         
      </script>
   </head>
   <body class="login">
      <div class="form">
         <form  action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
            <h3>Login</h3>
            <div class="in">
               <label>User Name</label>
               <input type="text"  name="username" required><i class='bx bxs-user-circle'></i>
            </div>
            <div class="in">
               <label>Password</label>
               <input type="password" style="margin-left:13px;"  name="password" required><i class='bx bxs-lock-alt' ></i>
            </div>
            <div style="padding-left:55px;">
               <button type="submit" class="btn" name="login">Login</button>
            </div>
            <div style="padding-left:55px;">
               <a href="register.php">New User???</a>
            </div>
         </form>
      </div>
      <?php
         if(isset($_POST["login"])){
         	$username=$_POST["username"];
             $password=$_POST["password"];
                $_SESSION["username"]=$username;
                if(isset($username)&&isset($password)){
         		$result=mysqli_query($connection,"select * FROM user WHERE username='$username' and password='$password'");
         		$count=mysqli_num_rows($result);
         		if ($count==1){
         			header("Location:KTMS.php");
                        $_SESSION["id"]=$result["id"];
                        $_SESSION["username"]=$result["username"];
         		}
         		else{
         			echo "<script type='text/javascript'>alert('Invalid username or password');</script>";
         		}
         	}
         }
            
         
         ?>
   </body>
</html>