<?php
session_start();
include("database.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        window.history.forward();
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basketball register</title>
</head>
<body>
    SUCCESSFULLY REGISTERED!!!
    <br>
    <?php
    $team=$_SESSION["team"];
    $college=$_SESSION["college"];
    $result2=mysqli_query($connection,"select name from basketball_register where team='$team';");
    echo "$college - $team :";
    ?> <br> <?php
    foreach($result2 as $a){
        echo $a['name'];
        ?> <br>
        <?php
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