<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["basketball"])) {
        $_SESSION["game"] = "basketball";
        header("Location:basketball.php");
        exit();
    }
    if (isset($_POST["football"])) {
        $_SESSION["game"] = "football";
        header("Location:football.php");
        exit();
    }
    if (isset($_POST["volleyball"])) {
        $_SESSION["game"] = "volleyball";
        header("Location:volleyball.php");
        exit();
    }
    if (isset($_POST["badminton"])) {
        $_SESSION["game"] = "badminton";
        header("Location:badminton.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KCT Tournament Management System</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .navbar {
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .navbar-text {
            font-size: 1.5rem;
        }

        .navbar-nav {
            display: flex;
            list-style: none;
        }

        .nav-item {
            margin-left: 20px;
        }

        .nav-link {
            color: #fff;
            text-decoration: none;
        }

        .nav-link:hover {
            text-decoration: underline;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            padding: 20px;
        }

        .sports-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .sport {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            width: 200px;
            transition: transform 0.3s;
        }

        .sport img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .sport p {
            margin: 15px 0;
            font-size: 1.2rem;
        }

        .sport:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <span class="navbar-text text-center">KCT Tournament Management System</span>
          <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item">
              <a class="nav-link" href="viewteams.php">View Teams</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    <div class="container">
        <div class="sports-grid">
            <div class="sport">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <button type="submit" name="basketball" value="basketball">
                        <img src="https://cdn.britannica.com/44/193844-131-1E4A9F84/ball-net-basketball-game-arena.jpg?w=840&h=460&c=crop" alt="Basketball">
                        <p>Basketball</p>
                    </button>
                </form>
            </div>
            <div class="sport">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <button type="submit" name="badminton" value="badminton">
                        <img src="https://www.racquetpoint.com/cdn/shop/articles/what-is-badminton-racquet-point.jpg?v=1654120169" alt="Badminton">
                        <p>Badminton</p>
                    </button>
                </form>
            </div>
            <div class="sport">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <button type="submit" name="football" value="football">
                        <img src="https://static9.depositphotos.com/1017950/1147/i/450/depositphotos_11473695-stock-photo-soccer-ball-and-goal-net.jpg" alt="Football">
                        <p>Football</p>
                    </button>
                </form>
            </div>
            <div class="sport">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <button type="submit" name="volleyball" value="volleyball">
                        <img src="https://st3.depositphotos.com/1518767/16578/i/450/depositphotos_165784478-stock-photo-cropped-hands-of-players-practicing.jpg" alt="Volleyball">
                        <p>Volleyball</p>
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
