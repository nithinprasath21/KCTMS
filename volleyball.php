<?php
include("database.php");
session_start();
?>
<?php
$result = mysqli_query($connection, "select matchname, venue, time, Dead_line from volleyball;");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volleyball</title>
    <style>
        body {
            background-color: #1e1e1e;
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .match {
            background-color: #2c2c2c;
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .match h4 {
            color: green;
            margin-bottom: 10px;
        }
        .match p {
            margin: 5px 0;
        }
        h3 {
            margin-top: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 80%;
            max-width: 600px;
        }
        input[type="text"],
        input[type="submit"] {
            padding: 10px;
            margin: 5px 0;
            border: none;
            border-radius: 5px;
            width: 100%;
        }
        input[type="submit"] {
            background-color: green;
            color: #1e1e1e;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #007700;
        }
    </style>
</head>
<body>
    <?php foreach ($result as $a) { ?>
    <div class="match">
        <h4><?php echo $a["matchname"]; ?></h4>
        <p>Venue: <?php echo $a["venue"]; ?></p>
        <p>Time: <?php echo $a["time"]; ?></p>
        <p>Deadline: <?php echo $a['Dead_line'] ?></p>
    </div>
    <?php } ?>
    <h3>Register here!!</h3>
    <form action="" method="POST">
        <input autocomplete="off" name="match" list="matches">
        <datalist id="matches">
            <?php foreach ($result as $a) { ?>
            <option value="<?php echo $a['matchname']; ?>" />
            <?php } ?>
        </datalist>
        <input type="submit" name="Done" value="Done">
    </form>
    <?php 
    if (isset($_POST["Done"])) {
        $_SESSION["matchname"] = $_POST["match"];
        header("Location:v_register.php");
    }
    ?>
    <form action="" method="POST">
        <input type="submit" value="Back" name="back">
    </form>
    <form action="v_guidelines.php">
        <input type="submit" value="View guidelines">
    </form>
</body>
</html>
<?php
if (isset($_POST["back"])) {
    unset($_SESSION["game"]);
    header("location:ktms.php");
    die();
}
?>