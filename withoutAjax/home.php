<?php
   include("session.php");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/indexCSS.css">

</head>
<body>

	<br>
	<br>
	<h2 align="center">Home Menu</h2>
	<center>
		<button class="btn" type="button" onclick="document.location.href='customerView.php'">Customer</button>
		<button class="btn" type="button" onclick="document.location.href='staffView.php'">Staff</button>
		<button class="btn" type="button" onclick="document.location.href='itemView.php'">Item</button>
		<button class="btn" type="button" onclick="document.location.href='bill.php'">Bill</button>
		<!--<br><br>
		<button class="btn" type="button">Salary Payment</button>
		<button class="btn" type="button">Commision</button>
		<button class="btn" type="button">Stock</button>
		<button class="btn" type="button">Purchase</button>
		<br><br>
		<button class="btn" type="button">Promotion</button>
		<button class="btn" type="button">Discount</button>
		<button class="btn" type="button">Appointment</button>
		<button class="btn" type="button">None</button>-->
		<br><br>
		<button class="btn" type="button" onclick="document.location.href='logout.php'">Log Off</button>


		
	</center>


</body>
</html>