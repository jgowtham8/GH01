<?php
	include("session.php");
	$id = $_GET["id"];
	$sql = "SELECT * FROM customer WHERE id = '$id'";

	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result);

	$name = $row[1];
	$phoneNo = $row[2];
	$dob = $row[3];
	$city = $row[4];


	if(isset($_POST["btnUpdate"])) {
		$sql2 = "select phoneNumber from customer where phoneNumber = '{$_POST["txtnumber"]}'";
		$res=$db->query($sql2);
		if($res->num_rows>0){
			echo "<script type='text/javascript'>alert('Phone No. already exists..!');</script>";

		}
		else{
			$sql = "UPDATE customer set name = '{$_POST["abc"]}', phoneNumber = '{$_POST["txtnumber"]}', birthYear = '{$_POST["txtyear"]}',city = '{$_POST["txtcity"]}' where id = '$id'";

			if (mysqli_query($db, $sql)) {
				header("location:customerView.php?mes=Succesfully Updated...");
			} 
			else {
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
    <h2 align="center" style="color: #663b95">Edit Customer</h2>
        
        <table border="1" width="50%" align="center" style="background-color: bisque">
	<tr>
		<td> 

			<form role="form" method="post" action="" >
			
			<table width="100%" align="center" border="0">
				<tr>
					<td width=20% id="x">
						<label> Name : </label>
					</td> 
							
					<td> 
						<input type="text"  name="abc" class="input" width="100" value="<?php echo $name; ?>">
					</td>
				</tr>

				<tr>
					<td id="x">
						<label>Phone No. : </label>
					</td> 
							
					<td> 
						<input type="Number" name="txtnumber" class="input" value="<?php echo $phoneNo; ?>">
					</td>
				</tr>				
				
				<tr>
					<td id="x">
						<label>Date of Birth :</label>
					</td> 
							
					<td> 
						<input type="Date" name="txtyear" class="input" value="<?php echo $dob; ?>">
					</td>
				</tr>

				<tr>
					<td id="x">
						<label>City :</label>
					</td> 
							
					<td> 
						<input type="text" name="txtcity" class="input" value="<?php echo $city; ?>">
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
                        <button id="xy" class="input" type="submit" name="btnUpdate">Update</button>
                                               
					</td>
				</tr>

			</table>
			</form>
			
		</td>
	</tr>
		</table>
        
	</body>
	
	</html>