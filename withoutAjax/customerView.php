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
	<h2 align="center" style="color: #663b95">Registered Customers</h2>
							
	<div id="outPopUp" class="tableContainer">
	<table border="1" cellpadding="0" cellspacing="0" align="center" style="background-color: bisque">
		<thead>
		<tr>
			<th>No.</th>
			<th>ID</th>
			<th>Name</th>
			<th>Phone No.</th>
			<th>Birth Year</th>
			<th>City</th>
			<th>Status</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$s="select * from customer";
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
							<td>{$r["name"]}</td>
							<td>{$r["phoneNumber"]}</td>
							<td>{$r["birthYear"]}</td>
							<td>{$r["city"]}</td>
							<td>{$r["status"]}</td>
							<td><a href='customerEdit.php?id=$RecordID'><button class='btnr'>Update</button></a></td>
							<td><a href='customerDelete.php?id=$RecordID&type=customer'><button class='btnr'>Delete</button></a></td>
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
	<a href="customerAdd.php"><button id="a" class="btnr">Add New</button></a>
	</center>
</div>
</body>
</html>