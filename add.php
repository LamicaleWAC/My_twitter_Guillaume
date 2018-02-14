<?php
session_start();
include_once("header.php");
include_once("functions.php");
 
$userid = $_SESSION['id'] = 1;
$body = substr($_POST['content'],0,140);
 
add_post();
$_SESSION['message'];
 
header("Location:index.php");
?>