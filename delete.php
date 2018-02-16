<?php
session_start();
include_once("header.php");
include_once("functions.php");
 
$idDeleteTweet = $_POST['delete'];
delete($idDeleteTweet);
 
header("Location:index.php");
?>