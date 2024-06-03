<?php
session_start();
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="loginstyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script type="text/javascript">
           window.history.forward();
        </script>
</head>
<body class="login">
    <div class="form">
<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
<h3>Sign Up</h3>
<div class="in">
        <input type="email" placeholder="email" name="email" required><br>
</div>
<div class="in">
		<input type="text" placeholder="username" name="username" required><br>
</div>
        <div class="in">

		<input type="password" placeholder="password" name="password" required><br>
        </div>
        <div style="padding-left:55px;">
            <button type="submit" class="btn" name="create" value="create">Create</button>
        </div>
        <div style="padding-left:175px;padding-top:20px;width:200px;">
			
            Already have an account?<a  href="index.php">login</a>
    </div>
	</form>
    </div>
    <?php
     try{
    if(isset($_POST["create"])){
        $email=$_POST["email"];
        $username=$_POST["username"];
        $password=$_POST["password"];
        
        
        if (isset($email)&&isset($username)&&isset($password)){
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                echo "Invalid email...";
            }
            else{
            $result=mysqli_query($connection,"select * from user where email='$email'");
           $counter=mysqli_num_rows($result);
           $result1=mysqli_query($connection,"select * from user where email!='$email' and username='$username';");
           $count=mysqli_num_rows($result1);
           if($counter>0){
            echo "User is already registered";
           }
        
        elseif($count>0){
            echo "Username already exists!..Try other names!";
        }
        else{
            $sql="insert into user (email,username,password) VALUES ('$email','$username','$password')";
            mysqli_query($connection,$sql);
            echo "User registered";  
        }
            
        }}
    }}
    catch(mysqli_sql_exception){

    }
    ?>
    
</body>
</html>