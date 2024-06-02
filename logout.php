<?php session_start();
if(empty($_SESSION['id'])):
    unset($_SESSION['username']);
    unset($_SESSION['matchname']);
    unset($_SESSION['id']);
    header('Location:index.php');
    die();
endif;
    ?>

<!DOCTYPE html>
<html>
    <head>
    <script type="text/javascript">
           window.history.forward();
        </script>
    </head>
<body>
<div style="width:150px;margin:auto;height:500px;margin-top:300px">

<?php
include('database.php');
session_destroy();
echo '<meta http-equiv="refresh" content="2;url=index.php">';
echo '<progress max=100><strong>Progress:60% done.</strong></progress><br>';
echo '<span class="itext">Logging out please wait!...</span>';

?>
</div>

</body>
</html>
