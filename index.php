<?php
include("database.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #1e1e1e;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form {
            background-color: #2c2c2c;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form h3 {
            text-align: center;
            margin-bottom: 20px;
            color: green;
        }

        .in {
            margin-bottom: 15px;
        }

        .in label {
            display: block;
            margin-bottom: 5px;
        }

        .in input {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: green;
            border: none;
            border-radius: 5px;
            color: #1e1e1e;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #d48806;
        }

        .form a {
            color: green;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 15px;
        }

        .form a:hover {
            text-decoration: underline;
        }
    </style>
    <script type="text/javascript">
        window.history.forward();
    </script>
</head>
<body class="login">
    <div class="form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h3>Login</h3>
            <div class="in">
                <label>User Name</label>
                <input type="text" name="username" required>
            </div>
            <div class="in">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <button type="submit" class="btn" name="login">Login</button>
            </div>
            <div>
                <a href="register.php">New User???</a>
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $_SESSION["username"] = $username;
        if (isset($username) && isset($password)) {
            $result = mysqli_query($connection, "SELECT * FROM user WHERE username='$username' AND password='$password'");
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION["id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                header("Location:KTMS.php");
                exit();
            } else {
                echo "<script type='text/javascript'>alert('Invalid username or password');</script>";
            }
        }
    }
    ?>
</body>
</html>
