<?php
	session_start();
	//include a db.php file to connect to database
	include("db.php");
	//create a variable called $pagename which contains the actual name of the page
	$pagename="Ordering Basket";
	//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
	echo "<link rel='stylesheet' type='text/css' href='mystylesheet.css'>";
	//display window title
	echo "<title>".$pagename."</title>";
	//include head layout
	include ("headfile.html");
	include ("detectlogin.php");
	//display name of the page and some random text
	echo "<h2>".$pagename."</h2>";

	$total=0;

	if (isset($_POST['submit'])) {
		$newprodid = $_POST['h_prodid'];	
		$reququantity = $_POST['p_quantity'];
		$_SESSION['basket'][$newprodid] = $reququantity;

		echo "<p><center>Your basket has been updated!</center></p>";
	}
	else {
		echo "<p><center>Existing Basket!</center></p>";
	}

	if(isset($_SESSION['basket'])) {
		echo "<table border='1'>";
		echo "<tr><th>Product</th><th>Price</th><th>Quantity</th><th>Sub Total</th></tr>";		

		foreach ($_SESSION['basket'] as $product => $val) {

			$sql = "select prodId,prodName,prodPicName,prodDescrip,prodPrice,prodQuantity from product where prodId=". $product .";";
			$execSql = mysql_query($sql) or die (mysql_error());

			while ($arrayprod = mysql_fetch_array($execSql)) {
				echo "<tr><td>";
				echo $arrayprod['prodName'];
				echo "</td><td>";
				echo "&#163; ".$arrayprod['prodPrice'];
				echo "</td><td>";
				echo $val;
				echo "</td><td>";
				echo "&#163; ". $subtotal = $arrayprod['prodPrice'] * $val;
				echo "</td></tr>";
				$total = $total + $subtotal;
			}
		}

		echo "<hr><td colspan=3>Total</td><td>&#163; ".$total."</td>";
		echo "</table>";

		echo "<a href=clearbasket.php>";
		echo "<button>Clear Basket</button>";
		echo "</a>";

	}
	else {
		echo "Basket is Empty!";
	}
	
	if (isset($_SESSION['customer']['customerId'])) {
		echo "<br><br>";
		echo "To finalize your order, <a href='checkout.php'>Checkout</a>";
	}
	else {
		echo "<br><br>";
		echo "New WorkedUp Customer? <a href='register.php'>Register Now</a>"; 
		echo "<br>";
		echo "Registered WorkedUp Member? <a href='login.php'>Login</a>";
	}
	 

	//include head layout
	include("footfile.html");
?>
