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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

      <a href="view.html"><h3><b>view profile</b></h3></a>
<a href="down.php"><h3><b>download certificate</b></h3></a>
<div style="width:100%;align-contents:right;background: transparent;border:2px solid rgba(255,255,255,.2);backdrop-filter: blur(20px);color:black;font-size: 50px;">
         <form action="logout.php">
            <input type="submit"  name="logout" value="Logout" style="width:60%;height:45px;background:transparent;border-width:2px;border-color: azure;border-style:solid;border-radius:5px;font-size:25px;cursor:pointer;">
         </form>
      </div>
    
</body>
</html>