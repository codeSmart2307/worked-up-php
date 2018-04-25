<?php
	//Initiate session
	session_start();
	//create a variable called $pagename which contains the actual name of the page
	$pagename="Customer Registration";
	//call in the style sheet called mystylesheet.css to format the page as defined in the style sheet
	echo "<link rel='stylesheet' type='text/css' href='mystylesheet.css'>";
	//display window title
	echo "<title>".$pagename."</title>";
	//include head layout
	include("headfile.html");
	echo "<p></p>";
	//display name of the page and some random text
	echo "<h2>".$pagename."</h2>";
	
	echo "<form name='reg-form' action='getregister.php' method='post'>";
	echo "<caption id='reg-caption'>Register and Create a WorkedUp Account</caption>";
	echo "<table border='1'>";
	echo "<tr><td><label>First Name</label></td><td><input type='text' size='40' name='f_name'></td></tr>";
	echo "<tr><td><label>Last Name</label></td><td><input type='text' size='40' name='l_name'></td></tr>";
	echo "<tr><td><label>Address</label></td><td><input type='text' size='40' name='address'></td></tr>";
	echo "<tr><td><label>Post Code</label></td><td><input type='text' size='40' name='p_code'></td></tr>";
	echo "<tr><td><label>Tel No</label></td><td><input type='text' size='40' name='tel_no'></td></tr>";
	echo "<tr><td><label>Email Address</label></td><td><input type='text' size='40' name='email'></td></tr>";
	echo "<tr><td><label>Password</label></td><td><input type='password' size='40' name='password'></td></tr>";
	echo "<tr><td><label>Confirm Password</label></td><td><input type='password' size='40' name='re_password'></td></tr>";
	echo "<tr><td><input type='submit' name='submit' value='Register'></td><td><input type='reset' name='reset' value='Clear Form'></td></tr>";
	echo "</table>";
	echo "</form>";
	
	//include footer layout
	include("footfile.html");
?>