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
	<h2 align="center" style="color: #663b95">Staff Management</h2>
							
	<div id="outPopUp" class="tableContainer">
	<table border="1" cellpadding="0" cellspacing="0" align="center" style="background-color: bisque">
		<thead>
		<tr>
			<th>No.</th>
			<th>ID</th>
			<th>Username</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Phone No.</th>
			<th>Commision</th>
			<th>Salary</th>
			<th>Type</th>
			<th>Status</th>
			<th>Update</th>
			<th>Delete</th>


		</tr>
	</thead>
	<tbody>
		<?php
			$s="select * from staff";
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
							<td>{$r["username"]}</td>
							<td>{$r["firstname"]}</td>
							<td>{$r["lastname"]}</td>
							<td>{$r["phoneNumber"]}</td>
							<td>{$r["commission"]}%</td>
							<td>Rs.{$r["salary"]}</td>
							<td>{$r["type"]}</td>
							<td>{$r["status"]}</td>
							<td><a href='staffEdit.php?id=$RecordID'><button class='btnr'>Update</button></a></td>
							<td><a href='staffEdit.php?id=$RecordID'><button class='btnr'>Delete</button></a></td>
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
	<a href="staffAdd.php"><button id="a" class="btnr">Add New</button></a>
	</center>
</div>
</body>
</html>