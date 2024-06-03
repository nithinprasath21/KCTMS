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
    <title>Football Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #333;
            color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .team-info {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .player-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .player-list li {
            padding: 10px;
            border-bottom: 1px solid #444;
        }
        .player-list li:last-child {
            border-bottom: none;
        }
        .back-button {
            background-color: #444;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">SUCCESSFULLY REGISTERED!!!</h2>
        <p class