<?php
	include("session.php");
	$tempName = null;
	$tempPhone = null;
	$tempBirth = null;
	$tempCity = null;

	if(isset($_POST["abc"])){
		$tempName = $_POST["abc"];
	}
	if(isset($_POST["txtnumber"])){
		$tempPhone = $_POST["txtnumber"];
	}
	if(isset($_POST["txtyear"])){
		$tempBirth = $_POST["txtyear"];
	}
	if(isset($_POST["txtcity"])){
		$tempCity = $_POST["txtcity"];
	}

	if(isset($_POST["btnRegister"])){
		$sql2 = "select phoneNumber from customer where phoneNumber = '{$_POST["txtnumber"]}'";
		$res=$db->query($sql2);
		if($res->num_rows>0){
			echo "<script type='text/javascript'>alert('Phone No. already exists..!');</script>";

		}
		else{
			$sql="insert into customer (name,phoneNumber,birthYear,city,status) values('{$_POST["abc"]}','{$_POST["txtnumber"]}','{$_POST["txtyear"]}','{$_POST["txtcity"]}','Active')";
			if($db->query($sql))
			{
				echo "<script type='text/javascript'>alert('Success..!');</script>";
				$tempName = null;
				$tempPhone = null;
				$tempBirth = null;
				$tempCity = null;
			}
			else
			{
				echo "<script type='text/javascript'>alert('Failed..!');</script>";
			}
		}		
	}


	?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/editCustomerCSS.css">
	</head>
<body>
    <h3 align="center" style="color: #663b95">Add Customer</h3>

<table border="1" width="50%" align="center" style="background-color: bisque">
	<tr>
		<td>
			
			<form role="form" method="post" action="customerAdd.php" >
			
			<table width="100%" align="center" border="0">
				<tr>
					<td width=20% id="x">
						<label>Name : </label>
					</td> 
							
					<td> 
						<input type="text"  name="abc" class="input" width="100" value="<?php echo $tempName; ?>" required>
					</td>
				</tr>

				<tr>
					<td id="x">
						<label>Phone No. : </label>
					</td> 
							
					<td> 
						<input type="Number" name="txtnumber" class="input" value="<?php echo $tempPhone; ?>" required>
					</td>
				</tr>				
				
				<tr>
					<td id="x">
						<label>Date of Birth :</label>
					</td> 
							
					<td> 
						<input type="Date" name="txtyear" class="input" value="<?php echo $tempBirth; ?>">
					</td>
				</tr>

				<tr>
					<td id="x">
						<label>City :</label>
					</td> 
							
					<td> 
						<input type="text" name="txtcity" class="input" value="<?php echo $tempCity; ?>">
					</td>
				</tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr>
					<td>			
                        <a href="customerView.php"><button id="xy" class="input" type="button" name="btnBack">Back</button></a>
					</td>
					<td>
                        <button id="xy" class="input" type="submit" name="btnRegister">Add</button>
					</td>
				</tr>

			</table>
			</form>
			
		</td>
	</tr>
		</table>
	</body>
	
	</html>