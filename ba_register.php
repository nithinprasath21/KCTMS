<?php
session_start();
include("database.php");
if(!$_SESSION["matchname"]){
    header("location:badminton.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badminton Register</title>
    
    
</head>
<body>

<br><br>

<form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
<div>
		<input type="text" placeholder="Team name" name="team" required><br>
</div>
<div>
		<input type="text" placeholder="College" name="college" required><br>
</div>
Players:
<?php 
for($i=1;$i<3;$i++){
 echo  "<div>
        <input type='text' placeholder='name$i' name='name$i' required>
       </div>";
}
       ?>
       <input type="submit" name="register" value="Register">
</form >


</body>
</html>
<?php
if(isset($_POST["register"])){
    $team=$_POST["team"];
$college=$_POST["college"];
$match=$_SESSION["matchname"];
    $result=mysqli_query($connection,"select * from badminton_register where team='$team';");
    $count=mysqli_num_rows($result);
if($count==0){
for($i=1;$i<3;$i++){
    $name=$_POST["name$i"];
    $sql="insert into badminton_register (team,name,college,matchname) values ('$team','$name','$college','$match');";
    mysqli_query($connection,$sql);
    header("Location:ba_success.php");
} 
$_SESSION["team"]=$team;
$_SESSION["college"]=$college;
}
else{
    echo "Choose new team name!!!";
}




}
?>
<form action="" method="POST">
    <input type="submit" value="back" name="back">
</form>
</body>
</html>
<?php 

        unset($_SESSION['matchname']);
        if(isset($_POST["back"])):
        header('Location:ktms.php');
        die();
        
    endif;
?>