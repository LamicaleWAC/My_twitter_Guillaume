<?php
session_start();
include_once("header.php");
include_once("functions.php");
 
$id = $_POST['id'] = 1;
$tweetid = $_POST['retweet'];
retweet($id, $tweetid);
 
header("Location:index.php");
?>