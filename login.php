<?php
	//Initiate session
	session_start();
	// Include the database connection
	include("db.php");
	//create a variable called $pagename which contains the actual name of the page
	$pagename="Login";
	//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
	echo "<link rel='stylesheet' type='text/css' href='mystylesheet.css'>";
	//display window title
	echo "<title>".$pagename."</title>";
	//include head layout
	include ("headfile.html");
	echo "<p></p>";
	//display name of the page and some random text
	echo "<h2>".$pagename."</h2>";
	
	echo "<form name='login-form' action='getlogin.php' method='post'>";
	echo "<caption id='reg-caption'>Login to your WorkedUp account</caption>";
	echo "<table border='1'>";	
	echo "<tr><td><label>Email Address</label></td><td><input type='text' size='40' name='loginEmail'></td></tr>";
	echo "<tr><td><label>Password</label></td><td><input type='password' size='40' name='loginPassword'></td></tr>";	
	echo "<tr><td><input type='submit' name='submit' value='Login'></td><td><input type='reset' name='reset' value='Clear Form'></td></tr>";
	echo "</table>";
	echo "</form>";

	//include head layout
	include("footfile.html");
?>