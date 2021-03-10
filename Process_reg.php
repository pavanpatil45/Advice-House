<?php
	include "config.php";

	// User registration Entry Validation

	$email = $_POST['email'];
    $username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
    $addr = $_POST['addr'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		echo "Please enter valid Email address";
	
	
	elseif($password !== $confirm_password)
		echo "Passwords do not match";
	
	else {
		// Validating the unavailability of email address
		$stmt = $conn->prepare("SELECT email FROM users WHERE email = :email");
		$stmt->execute(array(":email" => $email));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() == 1)
			echo "Email is not available";
		else
        { 
            
            $sql = "INSERT INTO users (email, username, password, address, city, state, zip) VALUES (:email, :username, :password, :addr, :city, :state, :zip )";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(
                ':email' => $email,
                ':username' => $username,
                ':password' => $hash,
                ':addr' => $addr,
                ':city' => $city,
                ':state' => $state,
                ':zip' => $zip,
            ));
            echo 0;
           // header("Location:login.php");
        }
       
	}
?>