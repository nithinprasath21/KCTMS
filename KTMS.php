<?php
   session_start();
   if(!$_SESSION['username']){
      header("location:index.php");
      die();   
    }
    
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="stylesheet" href="KTMS1.css">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>ktms</title>
   </head>
   <body>
      
      <div>
    <a href="option.php">
<button type="submit">
<img src="icon.png" alt="buttonpng" width="30" height="30"/>
</button>
</a>
      
      <hr>
      <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
         <div >
            <button type="submit" class="basketball" style="width:100%;" name="basketball" value="basketball"> BASKET BALL</button>
         </div>
         <hr/>
         <div class="badminton">
            <button type="submit" class="badminton" style="width:100%;" name="badminton" value="badminton"> BADMINTON</button>
         </div>
         <hr/>
         <div class="football">
            <button type="submit" class="football" style="width:100%;" name="football" value="football"> FOOT BALL</button>
         </div>
         <hr/>
         <div class="volleyball">
            <button type="submit" class="volleyball" style="width:100%;" name="volleyball" value="volleyball"> VOLLEY BALL</button>
         </div>
         <hr/>
      </form>
      <script>
         let subMenu=document.getElementById("subMenu");
         function toggleMenu(){
            subMenu.classList.toggle("open-menu");
         }
      </script>
   </body>
</html>
<?php
   if(isset($_POST["basketball"])){
    header("Location:basketball.php");
    $_SESSION["game"]="basketball";
   }
   if(isset($_POST["football"])){
      header("Location:football.php");
      $_SESSION["game"]="football";
     }
     if(isset($_POST["volleyball"])){
      header("Location:volleyball.php");
      $_SESSION["game"]="volleyball";
     }
     if(isset($_POST["badminton"])){
      header("Location:badminton.php");
      $_SESSION["game"]="badminton";
     }
   ?>