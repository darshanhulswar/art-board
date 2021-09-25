<?php
	
	include './php/db.config.php';

	$user = "./users/user_" . uniqid();
	$myFile = $user.".json";
	$fh = fopen($myFile, 'w') or die("can't open file");
	$stringData = $_POST;
	fwrite($fh, json_encode($stringData, JSON_PRETTY_PRINT));
	fclose($fh);

	echo json_encode($stringData, JSON_PRETTY_PRINT);
?>