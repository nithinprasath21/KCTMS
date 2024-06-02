<?php
session_start();
include("database.php");
if(!$_SESSION["matchname"]){
    header("location:football.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Register</title>
    <script type="text/javascript">
        window.history.forward();
    </script>
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
        <input type='text' placeholder='name$1' name='name$i' required>
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
    $result=mysqli_query($connection,"select * from football_register where team='$team';");
    $count=mysqli_num_rows($result);
if($count==0){
for($i=1;$i<3;$i++){
    $name=$_POST["name$i"];
    $sql="insert into football_register (team,name,college,matchname) values ('$team','$name','$college','$match');";
    mysqli_query($connection,$sql);
} 
$_SESSION["team"]=$team;
$_SESSION["college"]=$college;
}
else{
    echo "Choose new team name!!!";
}

}
header("Location:f_success.php");

?>

</body>
</html>