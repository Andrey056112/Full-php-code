<?php
include "includes/header.php";

$errors = [];

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
        
    if (!$email) {
        $errors['email'] = 'Вы не ввели почту!';
    }

    if (!$password) {
        $errors['password'] = 'Вы не ввели пароль!';
    }

    if (!count($errors)) {
        $user = $db->prepare('SELECT * FROM users WHERE email = ?');
        $user->execute([$email]);

        $user = $user->fetch();
        
        if ($user && $user ['password'] == md5($password)) {
            $_SESSION['user_id'] = $user['id'];

            redirect('index.php');
        } else {
            $errors['email'] = 'Неверная почта или пароль!';
        }
    }
}
?>


<div class="container">
    <form action="login.php" method="post" novalidate class="login-form">
        <h1 class="login-header">Вход</h1>
        <label class="login-label">
            Почта:   <input type="email" name="email" value="<?= $email ?? '' ?>">
        </label>
        <label>
            <?= $errors['email'] ?? '' ?>
        </label>
        <label class="login-label">
            Пароль:   <input type="password" name="password">
        </label>
        <label>
            <?= $errors['password'] ?? '' ?>
        </label>
        <input type="submit" name="submit" value="Войти" class="submit-booking-1-1">
    </form>
</div>