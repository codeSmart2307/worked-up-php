<?php
    session_start();
	//create a variable called $pagename which contains the actual name of the page
	$pagename="Logout";
	//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
	echo "<link rel='stylesheet' type='text/css' href='mystylesheet.css'>";
	//display window title
	echo "<title>".$pagename."</title>";
	//include head layout
	include ("headfile.html");
	echo "<p></p>";
	//display name of the page and some random text
	echo "<h2>".$pagename."</h2>";
    
    unset($_SESSION['basket']);
    unset($_SESSION['customer']);
    session_unset();
    session_destroy();
    echo "You have successfully logged out!<br/>";		

	//include head layout
	include("footfile.html");
?>