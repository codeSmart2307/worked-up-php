<?php
	session_start();
	// Include the database connection
	include("db.php");
	//create a variable called $pagename which contains the actual name of the page
	$pagename="Checkout Confirmation";
	//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
	echo "<link rel='stylesheet' type='text/css' href='mystylesheet.css'>";
	//display window title
	echo "<title>".$pagename."</title>";
	//include head layout
	include ("headfile.html");
	include ("detectlogin.php");
	//display name of the page and some random text
	echo "<h2>".$pagename."</h2>";
	
	$total = 0;
	$subTotal = 0;
	$currDateTime = date("Y-m-d H:i:s");

	$sql = "INSERT INTO orders(userId, orderDateTime) 
				VALUES('{$_SESSION['customer']['customerId']}', '$currDateTime')";
	$execSql = mysql_query($sql) or die(mysql_error());

	if (isset($_SESSION['basket'])) {
		if (mysql_errno() == 0) {
			$sql2 = "SELECT max(orderNo) AS maxNo FROM orders WHERE userId=" .$_SESSION['customer']['customerId']. ";";
			$execSql2 = mysql_query($sql2) or die(mysql_error());
			$results = mysql_fetch_array($execSql2);
			$latestOrderNo = $results['maxNo'];
			echo "<p>Your order has been placed successfully";
			echo "<b><p>ORDER NO: ".$latestOrderNo."</b>";
	
			echo "<table border=1 cellpadding=5>";
			echo "<tr>";
			echo "<th>Name</th>";
			echo "<th>Price</th>";
			echo "<th>Quantity</th>";
			echo "<th>Subtotal</th>";
			echo "</tr>";
	
			foreach($_SESSION['basket'] as $index => $quantity) {
				if ($index > 0) {
					$sql3 = "SELECT * FROM product WHERE prodId = " .$index;
					$execSql3 = mysql_query($sql3) or die(mysql_error());
					$results2 = mysql_fetch_array($execSql3);
					$subTotal = $quantity * $results2['prodPrice'];
	
					$sql4="INSERT INTO order_line (orderNo, prodId, quantityOrdered, subTotal)
							VALUES ('$latestOrderNo', '$index', '$quantity', '$subTotal')";
					$execSql4=mysql_query($sql4) or die(mysql_error());
	
					echo "<tr>";
					echo "<td>".$results2['prodName']."</td>";
					echo "<td>&#163; ".$results2['prodPrice']."</td>";
					echo "<td>" .$quantity. "</td>";
					echo "<td>&#163; " .number_format($subTotal,2). "</td>";
					echo "</tr>";
					$total = $total + $subTotal;
				}
			}
			echo "<tr>";
			echo "<td colspan=3><b>ORDER TOTAL</b></td>";
			echo "<td><b>&#163; " .number_format($total,2). "</b></td>";
			echo "</tr>";
			echo "</table>";
	
			$sql5 = "UPDATE orders SET orderTotal = " .$total. " WHERE orderNo = ". $latestOrderNo. ";";
			$execSql5 = mysql_query($sql5) or die (mysql_error());
			echo "<br>To leave the system, <a href=logout.php>Logout</a>";
		}
		else {
			echo "ERROR: Failed to place order!<br/>";		
		}
	}
	else {
		echo "Your basket is empty! <br/>";
		echo "Visit <a href='index.php'>Product Index</a> to add some items to the basket. <br/>";
	}	

	unset($_SESSION['basket']);

	//include head layout
	include("footfile.html");
?>