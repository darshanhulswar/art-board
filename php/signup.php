<?php
	include "./db.config.php";

	// redirect if in case direct access
	if(empty($_POST)){
		header("location: ../signup.html");
	}

	// store all the data from ajax request
	$postData = $_POST;
	$firstname = $_POST["firstName"];
	$lastname = $_POST["lastName"];
	$gender = $_POST["gender"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$password = $_POST["password"];
	
	// email already exist, throw an error else execute the prepard stmt
	if(!$data = $stmtRegister->execute()) {
		$postData = [];
		$postData["error"] = "Alredy Exist!";
	} else {

		// Create user.json file
		createUserJSON($postData);

		// clear the array and give response with success message in it
		$postData = [];
		$postData["success"] = "Registration successfull!";
	}

	echo json_encode($postData, JSON_PRETTY_PRINT);

	function createUserJSON($postData) {

		$user = "../users/user_" . uniqid();
		$myFile = $user.".json";

		$fh = fopen($myFile, 'w') or die("can't open file");
		fwrite($fh, json_encode($postData, JSON_PRETTY_PRINT));
		fclose($fh);

		return 1;
	}
?>