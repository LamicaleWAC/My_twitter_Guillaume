<?php
include_once('header.php');
function add_post(){
	$id = $_SESSION["id"];
	$content = $_POST["content"];
		$db = new bdd();
        $rq = $db->request("INSERT INTO tweet (content, id_user)  VALUES  ('$content',$id)");


}
?>