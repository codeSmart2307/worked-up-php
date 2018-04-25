<?php
	//Initiate session
	session_start();
	// Include the database connection
	include("db.php");
	//create a variable called $pagename which contains the actual name of the page
	$pagename="Registration Confirmation";
	//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
	echo "<link rel='stylesheet' type='text/css' href='mystylesheet.css'>";
	//display window title
	echo "<title>".$pagename."</title>";
	//include head layout
	include ("headfile.html");
	echo "<p></p>";
	//display name of the page and some random text
	echo "<h2>".$pagename."</h2>";
	
	$fName = $_POST['f_name'];
	$lName = $_POST['l_name'];
	$address = $_POST['address'];
	$postalCode = $_POST['p_code'];
	$telNo = $_POST['tel_no'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$rePassword = $_POST['re_password'];

	$reg = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/"; // regex to validate email

	// Validating if fields are empty using the empty() function
	if (empty($fName) || empty($lName) || empty($address) || empty($postalCode) || empty($telNo) || empty($email) || empty($password) || empty($rePassword)) {
		echo "All fields are necessary!<br/>";
		echo "Go back to <a href='register.php'>Register</a>";
	}	
	else {
		// Validating if password is the same in both fields
		if($password != $rePassword) {
			echo "The 2 passwords you entered do not match! Please make sure you enter them correctly.<br/>";
			echo "Go back to <a href='register.php'>Register</a>";
		}
		else {
			// Validating email using the preg_match function which compares the input email with the regular expression $reg
			if (!preg_match($reg, $email)) {
				echo "Email not valid!<br/>";
				echo "Go back to <a href='register.php'>Register</a>";
			}
			else {
				$sql = "INSERT INTO users(userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword) 
				VALUES('$fName', '$lName', '$address', '$postalCode', '$telNo', '$email', '$password')";
				$execSql = mysql_query($sql) or die(mysql_error());
	
				if (mysql_errno() == 0) {
					echo "You have been registered successfully in the system!<br/>";
					echo "To continue, please <a href='login.php'>Login</a>";
				}
				else {
					echo "ERROR: Failed to register!<br/>";
					if (mysql_errno() == 1062) {				
						echo "The email you entered already exists!<br/>";
						echo "Go back to <a href='register.php'>Register</a>";
					}
				}
			}			
		}
	}
	
	//include head layout
	include("footfile.html");
?>