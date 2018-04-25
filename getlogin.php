<?php
	//Initiate session
	session_start();
	// Include the database connection
	include("db.php");
	//create a variable called $pagename which contains the actual name of the page
	$pagename="Login Confirmation";
	//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
	echo "<link rel='stylesheet' type='text/css' href='mystylesheet.css'>";
	//display window title
	echo "<title>".$pagename."</title>";
	//include head layout
	include ("headfile.html");
	echo "<p></p>";
	//display name of the page and some random text
	echo "<h2>".$pagename."</h2>";
	
	$email = $_POST['loginEmail'];
	$password = $_POST['loginPassword'];

	// Validating if fields are empty using the empty() function
	if (empty($email) || empty($password)) {
		echo "Your form is incomplete!<br/>";
		echo "Please fill in all the required details.<br/>";
		echo "Go back to <a href='login.php'>Login</a>";
	}	
	else {
		$sql = "SELECT * FROM users WHERE userEmail = '$email';";		
		$execSql = mysql_query($sql) or die (mysql_error());		
		$arrayprod = mysql_fetch_array($execSql);

		$db_email = $arrayprod['userEmail'];
		$db_password = $arrayprod['userPassword'];

		if($email != $db_email) {
			echo "Sorry, the email you entered was not recognized!<br/>";			
			echo "Go back to <a href='login.php'>Login</a>";
		}
		else {			
			if ($password != $db_password) {
				echo "Sorry, the password you entered is not valid!<br/>";			
				echo "Go back to <a href='login.php'>Login</a>";
			}
			else {
				$_SESSION['customer']['customerId'] = $arrayprod['userId'];
				$_SESSION['customer']['customerFName'] = $arrayprod['userFName'];
				$_SESSION['customer']['customerLName'] = $arrayprod['userSName'];
				echo "<strong>Hello, ".$_SESSION['customer']['customerFName']. " " .$_SESSION['customer']['customerLName']. "</strong><br/>";
				echo "You have successfully logged into the system!<br/>";
				echo "The email you entered is " . $db_email . "<br/><br/>";
				echo "To continue shopping, go to the <a href='index.php'>Product Index</a><br/>";
				echo "To view your basket, go to <a href='basket.php'>My Basket</a>";
			}			
		}
	}

	//include head layout
	include("footfile.html");
?>