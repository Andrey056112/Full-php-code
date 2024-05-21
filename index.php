<?php
include "includes/header.php";

$services = $db->query('SELECT * FROM services')->fetchAll();
?>
<div class="container">
    <div class="tiles">
    <?php foreach ($services as $service):?>
        <div class="tail">
            <img src=<?= $service['img_path']?> alt="cat">
            <p class="tail-title"><?= $service['name']?></p>
            <p>Стоимость: <?= $service['price']?>р/день</p>
            <a href="booking.php?id=<?= $service["id"]?>" class="tail-link">Забронировать</a>
        </div>
    <?php endforeach; ?>
    </div>
</div>
