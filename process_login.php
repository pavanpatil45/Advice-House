<?php
	include "config.php";
	
	// User Sign In Entry Validation
	$email = trim($_POST['email']);
	$password = $_POST['password'];
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		echo "Please enter valid Email address";
	
	
	else {
		$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
		$stmt->execute(array(":email" => $email));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		// Validating the credentials
		if($stmt->rowCount() == 0)
			echo "Account $email does not exist";
		elseif(!password_verify($password, $row['password']))
			echo "Incorrect Password";
		
		else
        {   $email=$row['email'];
            // session_start();
            $_SESSION['email']=$email;
            
        }
                   
	}
?>