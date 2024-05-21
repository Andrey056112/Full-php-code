<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=andrey.lozovoy.todoapp', 'root', '');

function d($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function getService($id)
{
    global $db;

    $service = $db->prepare('SELECT * FROM services WHERE id = ?');

    $service->execute([$id]);
    return $service->fetch();
}

function redirect($url)
{
    header('Location: ' . $url);
    exit;
}

function getUser($id)
{
    global $db;

    $user = $db->prepare('SELECT * FROM users WHERE id = ?');
    $user->execute([$id]);

    return $user->fetch();
}

$query = $db->prepare('SELECT * FROM users');

$user = isset($_SESSION['user_id']) ? getUser($_SESSION['user_id']) : false;
?>

