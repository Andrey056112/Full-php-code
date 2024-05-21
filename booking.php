<?php
include "includes/header.php";

$service = getService($_GET['id'] ?? 0);

$errors = [];

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);
    $days = trim($_POST['days']);

    if (!is_numeric($days) || !$days) {
        $errors['days'] = "Неверное количество дней";
    }

    if (!$name || mb_strlen($name) > 120) {
        $errors['name'] = "Введите имя!";
    }

    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Неверная почта!";
    }

    if (count($errors) === 0) {
        $insertQuery = $db->prepare('INSERT INTO booking (name,email,days,comment,name_service,moderation) VALUES (:name,:email,:days,:comment,:name_service,:moderation)');
        $insertQuery->execute([
            'name' => $name,
            'email' => $email,
            'days' => $days,
            'comment' => $comment,
            'name_service' => $service['name'],
            'moderation' => 'Ожидается'
        ]);

        redirect('index.php');
    }
}
?>

<div class="container">
    <div class="tiles" class="form-booking">
        <div class="tail">
            <img src=<?= $service['img_path']?> alt="cat">
            <p class="tail-title"><?= $service['name']?></p>
            <p>Стоимость: <?= $service['price']?>р/день</p>
        </div>
        <form action="booking.php?id=<?= $service['id'] ?>" method="post" novalidate class="form-form">
            <label class="form-booking">
                <p>Введите имя:   <input type="text" name="name" placeholder="Имя">
            </label>
            <label>
                <?= $errors['name'] ?? '' ?>
            </label>
            <label class="form-booking">
            <p>Введите почту:  <input type="email" name="email" placeholder="Почта">
            </label>
            <label>
                <?= $errors['email'] ?? '' ?>
            </label>
            <label class="form-booking">
            <p>Введите кол-во дней:  <input type="text" name="days" placeholder="Количество дней">
            </label>
            <label>
                <?= $errors['days'] ?? '' ?>
            </label>
            <label>
                <p>Ваш коментарий:  <textarea type="text" name="comment" class="form-comment" placeholder="(Необязательное поле)"></textarea>
            </label>
            <input type="submit" name="submit" placeholder="Забронировать" class="submit-booking">
        </form>
    </div>
</div>