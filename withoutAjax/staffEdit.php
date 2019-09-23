<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/editCustomerCSS.css">
	</head>
<body>
    <h2 align="center" style="color: #663b95">Edit Staff</h2>
        
        <table border="1" width="50%" align="center" style="background-color: bisque">
	<tr>
		<td> 

			<?php
			include("session.php");
			$id = $_GET['id'];
			$sql = "SELECT * FROM staff WHERE id = '$id'";

     		$result = mysqli_query($db,$sql);
      		$row = mysqli_fetch_array($result);

      		$userName = $row[1];
      		$password = $row[2];
      		$firstName = $row[3];
      		$lastName = $row[4];
      		$phoneNumber = $row[5];
      		$commision = $row[6];
      		$salary = $row[7];
      		$type = $row[8];
			?>
			
			<form role="form" method="post" action="" >
			
			<table width="100%" align="center" border="0">
				<tr>
					<td width=20% id="x">
						<label> Username : </label>
					</td> 
							
					<td> 
						<input type="text"  name="userName" class="input" width="100" value=<?php echo $userName; ?>> <br>
					</td>
				</tr>

				<tr>
					<td id="x">
						<label>Password : </label>
					</td> 
							
					<td> 
						<input type="password" name="password" class="input" value=<?php echo $password; ?>>
					</td>
				</tr>				
				
				<tr>
					<td id="x">
						<label>First Name :</label>
					</td> 
							
					<td> 
						<input type="text" name="firstName" class="input" value=<?php echo $firstName; ?>>
					</td>
				</tr>

				<tr>
					<td id="x">
						<label>Last Name :</label>
					</td> 
							
					<td> 
						<input type="text" name="lastName" class="input" value=<?php echo $lastName; ?>>
					</td>
				</tr>

				<tr>
					<td id="x">
						<label>Phone No. : </label>
					</td> 
							
					<td> 
						<input type="Number" name="phoneNumber" class="input" value=<?php echo $phoneNumber; ?>>
					</td>
				</tr>	

				<tr>
					<td id="x">
						<label>Commission : </label>
					</td> 
							
					<td> 
						<input type="Number" name="commission" class="input" value=<?php echo $commision; ?>>
					</td>
				</tr>	

				<tr>
					<td id="x">
						<label>Salary : </label>
					</td> 
							
					<td> 
						<input type="Number" name="salary" class="input" value=<?php echo $salary; ?>>
					</td>
				</tr>	

				<tr>
					<td id="x">
						<label>User Type : </label>
					</td> 
							
					<td> 
						<select name="type" class="input" >
							<option value=<?php echo $type; ?>><?php echo $type; ?></option>
							<option value="Admin">Admin</option>
							<option value="Cashier">Cashier</option>
							<option value="Worker">Worker</option>
						</select>

					</td>
				</tr>	
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr>
					<td>
                                            <button id="xy" class="input" type="submit" name="btnBack">Back</button>
					</td>
					<td>
                                            <button id="xy" class="input" type="submit" name="btnUpdate">Update</button>
                                               
					</td>
				</tr>

			</table>
			</form>
			<?php
				
				if(isset($_POST["btnUpdate"])) {
				
					$sql = "UPDATE staff set username = '{$_POST["userName"]}', password = '{$_POST["password"]}', firstname = '{$_POST["firstName"]}',lastname = '{$_POST["lastName"]}', phoneNumber = '{$_POST["phoneNumber"]}', commission = '{$_POST["commission"]}', salary = '{$_POST["salary"]}', type = '{$_POST["type"]}' where id = '$id'";

					if (mysqli_query($db, $sql)) {
						header("location:staffView.php?mes=Succesfully Updated...");
					} 
					else {
   					 	echo "Error updating record: " . mysqli_error($db);
					}	
					
				}
                                
                                if(isset($_POST["btnBack"])){
					header("location:staffView.php");
				}

				
				
			?>
		</td>
	</tr>
		</table>
        
	</body>
	
	</html>