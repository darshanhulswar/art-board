<?php 

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpassword = "";
	$dbname = "art-board";

	$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

	// If connection error
	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		// echo json_encode(array("connectionStatus" => "success"));
	}

	// prepare the register statement
	$stmtRegister = $conn->prepare("INSERT INTO `users`(`firstname`, `lastname`, `gender`, `email`, `phone`, `password`) VALUES (?, ?, ?, ?, ?, ?)");
	$stmtRegister->bind_param("ssssss", $firstname, $lastname, $gender, $email, $phone, $password);

	// prepare the authentication statement
	$stmtAuth = $conn->prepare("SELECT * FROM users WHERE email=?");
	$stmtAuth->bind_param("s", $email);

	/*
	$email = "darshan@gmail.com";
	$stmtAuth->execute();
	$result = $stmtAuth->get_result();
	$data = $result->fetch_assoc();

	var_dump($data);
	*/
	
?>