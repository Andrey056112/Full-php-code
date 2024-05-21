<?php
include 'includes/header.php';

$bookings = $db->query('SELECT * FROM booking WHERE moderation = "Ожидается"')->fetchAll();
?>

<div class="container">
    <div class="tiles-admin">
        <?php foreach($bookings as $booking): ?>
            <div class="tail-admin">
                <div class="tail-item">ID: <?= $booking['id']?></div>
                <div class="tail-item">Имя: <?= $booking['name']?></div>
                <div class="tail-item">Почта: <?= $booking['email']?></div>
                <div class="tail-item">Дней: <?= $booking['days']?></div>
                <div class="tail-item">Коментарий: <?= $booking['comment']?></div>
                <div class="tail-item">Класс: <?= $booking['name_service']?></div>
                <div class="tail-item">Статус: <?= $booking['moderation']?></div>
                <div class="tail-item">
                    <a href="accept.php?id=<?= $booking['id']?>" class="admin-buttom">Принять</a>
                    <a href="decline.php?id=<?= $booking['id']?>" class="admin-buttom">Отклонить</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>