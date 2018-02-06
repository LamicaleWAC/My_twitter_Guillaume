<?php

$new_msg = $_POST['new_msg'];
$db = new PDO('mysql:host=localhost;dbname=test_msg', 'root', '');
$sql = ('INSERT INTO msg VALUES (null, ?, Now(), 1, ?)');
session_start();
$id = $_SESSION['id_msg'];
$db->prepare($sql)->execute([$_POST['new_msg'], $_SESSION['id_msg']]);
header("Location: private_msg.php?id=$id");