<?php
include "includes/core.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
        <title>Котейка</title>
    </head>
    <body>
        <div class="container">
            <ul class="header-list">
                <li><a href="index.php" class="header-link">Главная страница</a></li>
                <?php if (!$user): ?>
                <li><a href="login.php" class="header-link">Войти</a></li>
                <?php else: ?>
                <li><a href="logout.php" class="header-link">Выход</a></li>
                <li><a href="moderation.php" class="header-link">Модерация</a></li>
                <?php endif; ?>
            </ul>
        </div>
    <hr class="header-line"></hr>

