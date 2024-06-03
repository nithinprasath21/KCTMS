<?php
session_start();
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h3>Sign Up</h3>
            <div class="in">
                <input type="email" placeholder="Email" name="email" required><br>
            </div>
            <div class="in">
                <input type="text" placeholder="Username" name="username" required><br>
            </div>
            <div class="in">
                <input type="password" placeholder="Password" name="password" required><br>
            </div>
            <div>
                <button type="submit" class="btn" name="create" value="create">Create</button>
            </div>
            <div style="padding-top: 20px; text-align: center;">
                Already have an account? <a href="index.php">Login</a>
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST["create"])) {
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        if (isset($email) && isset($username) && isset($password)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Invalid email...');</script>";
            } else {
                $result = mysqli_query($connection, "SELECT * FROM user WHERE email='$email'");
                $counter = mysqli_num_rows($result);
                $result1 = mysqli_query($connection, "SELECT * FROM user WHERE email!='$email' AND username='$username'");
                $count = mysqli_num_rows($result1);

                if ($counter > 0) {
                    echo "<script>alert('User is already registered');</script>";
                } elseif ($count > 0) {
                    echo "<script>alert('Username already exists!..Try other names!');</script>";
                } else {
                    $sql = "INSERT INTO user (email,username,password) VALUES ('$email','$username','$password')";
                    mysqli_query($connection, $sql);
                    echo "<script>alert('User registered');</script>";
                }
            }
        }
    }
    ?>
</body>
</html>
