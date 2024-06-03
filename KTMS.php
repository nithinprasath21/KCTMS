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
    <link rel="stylesheet" href="KTMS1.css">
    <style>
      * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    text-decoration: none;
}

body {
    font-family: Arial, sans-serif;
    background-color: #333;
    color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}

.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 80%;
    margin: 20px 0;
    color: #fff;
}

.icon-button {
    background: none;
    border: none;
    cursor: pointer;
}

h1 {
    font-size: 2rem;
    text-align: center;
}

hr {
    width: 80%;
    border: 1px solid #555;
    margin: 20px 0;
}

.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    flex-direction: row;
    gap: 20px;
    width: 80%;
    padding: 10px;
}

.sport {
    position: relative;
    width: 250px;
    height: 250px;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    cursor: pointer;
}

.sport button {
    width: 100%;
    height: 100%;
    border: none;
    padding: 0;
    background: none;
    cursor: pointer;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.sport img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.sport .overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    text-align: center;
    padding: 10px;
    font-size: 1.5rem;
    transition: background 0.3s ease;
}

.sport:hover img {
    transform: scale(1.1);
}

.sport:hover .overlay {
    background: rgba(0, 0, 0, 0.7);
}

center p {
    margin-top: 20px;
    font-size: 1rem;
    color: #aaa;
    text-align: center;
}

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KCT Tournament Management</title>
</head>
<body>
    <div class="header">
        <a href="option.php">
            <button type="button" class="icon-button">
                <img src="icon.png" alt="Options" width="30" height="30"/>
            </button>
        </a>
        <h1>KCT Tournament Management</h1>
    </div>
    <hr>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="sport">
                <button type="submit" name="basketball" value="basketball">
                    <img src="https://cdn.britannica.com/44/193844-131-1E4A9F84/ball-net-basketball-game-arena.jpg?w=840&h=460&c=crop" alt="Basketball">
                    <div class="overlay">BASKETBALL</div>
                </button>
            </div>
            <div class="sport">
                <button type="submit" name="badminton" value="badminton">
                    <img src="https://www.racquetpoint.com/cdn/shop/articles/what-is-badminton-racquet-point.jpg?v=1654120169" alt="Badminton">
                    <div class="overlay">BADMINTON</div>
                </button>
            </div>
            <div class="sport">
                <button type="submit" name="football" value="football">
                    <img src="https://static9.depositphotos.com/1017950/1147/i/450/depositphotos_11473695-stock-photo-soccer-ball-and-goal-net.jpg" alt="Football">
                    <div class="overlay">FOOTBALL</div>
                </button>
            </div>
            <div class="sport">
                <button type="submit" name="volleyball" value="volleyball">
                    <img src="https://st3.depositphotos.com/1518767/16578/i/450/depositphotos_165784478-stock-photo-cropped-hands-of-players-practicing.jpg" alt="Volleyball">
                    <div class="overlay">VOLLEYBALL</div>
                </button>
            </div>
        </form>
    </div>
    <center>
        <p>Done by <br>Nikileshwar - 22BCS078, Nithin Prasath - 22BCS081, Pranesh - 22BCS086, Rajasekaran - 22BCS096</p>
    </center>
    <script>
        function toggleMenu() {
            let subMenu = document.getElementById("subMenu");
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>
</html>
