<?php
include 'includes/core.php';

$bron = $db->prepare('UPDATE booking SET moderation="Отказано" WHERE id = ?');
$bron->execute([$_GET['id']]);

redirect('moderation.php');
?>