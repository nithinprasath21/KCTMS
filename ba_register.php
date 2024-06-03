<?php
session_start();
include("database.php");
if (!$_SESSION["matchname"]) {
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
    <style>
        body {
            background-color: #1e1e1e;
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #2c2c2c;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 400px;
            text-align: center;
        }
        .form-container input[type="text"],
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        .form-container input[type="submit"] {
            background-color: green;
            color: #1e1e1e;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-container input[type="submit"]:hover {
            background-color: #007700;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
            <div>
                <input type="text" placeholder="Team name" name="team" required>
            </div>
            <div>
                <input type="text" placeholder="College" name="college" required>
            </div>
            Players:
            <?php 
            for ($i = 1; $i <= 5; $i++) {
                echo "<div><input type='text' placeholder='name$i' name='name$i' required></div>";
            }
            ?>
            <input type="submit" name="register" value="Register">
        </form>
        <form action="" method="POST">
            <input type="submit" value="Back" name="back">
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST["register"])) {
    $team = $_POST["team"];
    $college = $_POST["college"];
    $match = $_SESSION["matchname"];
    $result = mysqli_query($connection, "select * from badminton_register where team='$team';");
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        for ($i = 1; $i <= 5; $i++) {
            $name = $_POST["name$i"];
            $sql = "insert into badminton_register (team, name, college, matchname) values ('$team', '$name', '$college', '$match');";
            mysqli_query($connection, $sql);
        }
        $_SESSION["team"] = $team;
        $_SESSION["college"] = $college;
        header("Location:ba_success.php");
    } else {
        echo "Choose new team name!!!";
    }
}
if (isset($_POST["back"])) {
    unset($_SESSION['matchname']);
    header('Location:ktms.php');
    die();
}
?>
