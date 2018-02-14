<?php
session_start();
include_once('header.php');
include_once('functions.php');
 
$_SESSION['userid'] = 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <link rel="stylesheet" href="style.css">
<head>
     <input type="submit" id="connexion" class="btn btn-primary" value="Se connecter">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Twitter</title>
</head>

<body>
 
<?php
if (isset($_SESSION['message'])){
    echo "<b>". $_SESSION['message']."</b>";
    unset($_SESSION['message']);
}
?>
<div id="profil_index" name="profil_index"> <p>Profil en construction... </div>
<div id="tendance" name="tendance"><p>Nique les tendances</p> </div>
<div id="timeline" name="timeline">
<form method='post' action='add.php'>
<p>Que pensez vous ?</p>
<textarea name='content' rows='5' cols='40' wrap=VIRTUAL></textarea>
<p><input type='submit' value='submit'/></p>
</form>
 <?php
$posts = show_posts($_SESSION['userid']);
 
if (count($posts)){
?>
<table border='1' cellspacing='0' cellpadding='5' width='500'>

<?php
foreach ($posts as $key => $list){

    echo "<tr valign='top'>\n";
    echo "<td>".$list['username'] ."</td>\n";
    echo "<td>".$list['content'] ."<br/>\n";
    echo "<small>".$list['created_date'] ."</small></td>\n";
    echo "<td>";
    ?>
    <form method='post' action='favoris.php'> <?php
    echo "<input id='prodId' name='prodId' type='hidden' value='" .$list['id'] . "'>";
    echo "<form action='love.php' method='post'>
    <input type='submit'>";
    echo "</td>";
    echo "<td>";
        ?>
    </form>
    <form method='post' action='retweet.php'>
        <?php
    echo "<input id='prodId' name='prodId' type='hidden' value='" .$list['id'] . "'>";
    echo "<form action='retweet.php' method='post'>
    <input type='submit'>"; 
    echo "</td>";  
    echo "<td>";
        ?></form>
    <form method='post' action='repondre.php'>
        <?php
    echo "<input id='prodId' name='prodId' type='hidden' value='" .$list['id'] . "'>";
    echo "<form action='repondre.php' method='post'>
    <input type='submit'>"; ?></form> <?php
    echo "</td>";
    echo "</tr>\n";
}
?>


</table>
<?php
}else{
?>
<p><b>Il n'y a rien à voir ici...</b></p>
<?php
}
?>
</div>

<div id="suggestions" name="suggestions"> <p>Pas de suggestions ? rekt</div>
<div id="copyright" name="copyright"><p>Produit par l'amicale, niquez vous </div>
    <script type="text/javascript" src="redi.js"></script>
</body>
</html>