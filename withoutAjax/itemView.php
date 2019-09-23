<?php
	include("session.php");

	if(isset($_GET["mes"]))
	{
		echo "<script type='text/javascript'>alert('{$_GET["mes"]}');</script>";
	}
					
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/customerViewCSS.css">
	</head>
<body>
	<h2 align="center" style="color: #663b95">Item Management</h2>
							
	<div id="outPopUp" class="tableContainer">
	<table border="1" cellpadding="0" cellspacing="0" align="center" style="background-color: bisque">
		<thead>
		<tr>
			<th>No.</th>
			<th>ID</th>
			<th>Name</th>
			<th>Type</th>
			<th>Cost</th>
			<th>Qty</th>
			<th>Price</th>
			<th>Status</th>
			<th>Update</th>
			<th>Delete</th>

		</tr>
	</thead>
	<tbody>
		<?php
			$s="select * from items";
			$res=$db->query($s);
			if($res->num_rows>0)
			{
				$res=$db->query($s);

				$i=0;
				while($r=mysqli_fetch_array($res))
				{
					$i++;
					$RecordID = $r[0];

					echo "
			
						<tr>
							<td>{$i}</td>
							<td>{$r["id"]}</td>
							<td>{$r["Name"]}</td>
							<td>{$r["Type"]}</td>
							<td>Rs.{$r["cost"]}</td>
							<td>{$r["qty"]}</td>
							<td>Rs.{$r["price"]}</td>
							<td>{$r["status"]}</td>
							<td><a href='itemEdit.php?id=$RecordID'><button class='btnr'>Update</button></a></td>
							<td><a href='itemEdit.php?id=$RecordID'><button class='btnr'>Delete</button></a></td>
						</tr>
					
					
					
					";
					
				}
			}
			else
			{
				echo "<p align=center>No Record Found</p>";
			}
		
		
		
		?>
	
	
	</tbody>
	
	
	
	
	
	
	</table>
</div>
<br>
<div>
	<center>
	<a href="home.php"><button id="a" class="btnr">Back</button></a>
	<a href="itemAdd.php"><button id="a" class="btnr">Add New</button></a>
	</center>
</div>
</body>
</html>