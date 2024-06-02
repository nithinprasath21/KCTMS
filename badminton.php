<?php
include("database.php");
session_start();
?>
<?php
 $result=mysqli_query($connection,"select matchname,venue,time,Dead_line from badminton;");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>badminton</title>
    

    
</head>
<body>
    <?php
     foreach($result as $a){
    ?>
    <div style="background-color:aquamarine;">
       <?php echo $a["matchname"];?><br>
       <?php echo $a["venue"];?><br>
       <?php echo $a["time"];?><br><br>
       <?php echo "Dead line: ".$a['Dead_line'] ?>
       
       <hr/>
    </div>
     <?php }
        ?>
 Register here!!
 <br>
 <form action="" method="POST">
 <input autocomplete="off" name="match" list="matches">
 <datalist id="matches">
    <?php foreach($result as $a){

    ?>
    <option value="<?php echo $a['matchname']; ?>" />
    <?php } ?>
 </datalist>
 <input  type="submit" name="Done" value="Done">
    </form>
    
    <?php 
    if(isset($_POST["Done"])){
        $_SESSION["matchname"]=$_POST["match"];
       header("Location:ba_register.php"); 
    }?>
    <form action="" method="POST">
    <input type="submit" value="back" name="back">
</form>
<form action="ba_guidelines.php">
<input type="submit" 
   value="View guidelines">
        
</body>
</html>
<?php
if(isset($_POST["back"])){
   unset($_SESSION["game"]);
   header("location:ktms.php");
   die();
}
?>
