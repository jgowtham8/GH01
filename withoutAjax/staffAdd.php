<?php 
	include("session.php");
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/editCustomerCSS.css">
	</head>
<body>
    <h3 align="center" style="color: #663b95">Add Staff</h3>

<table border="1" width="50%" align="center" style="background-color: bisque">
	<tr>
		<td>
			
			<form role="form" method="post" action="" >
			
			<table width="100%" align="center" border="0">
				<tr>
					<td width=20% id="x">
						<label>Username : </label>
					</td> 
							
					<td> 
						<input type="text"  name="txtUsername" class="input"> <br>
					</td>
				</tr>

				<tr>
					<td id="x">
						<label>Password : </label>
					</td> 
							
					<td> 
						<input type="Password" name="txtPassword" class="input">
					</td>
				</tr>

				<tr>
					<td id="x">
						<label>First Name : </label>
					</td> 
							
					<td> 
						<input type="text" name="txtFName" class="input">
					</td>
				</tr>				
				
				<tr>
					<td id="x">
						<label>Last name :</label>
					</td> 
							
					<td> 
						<input type="text" name="txtLName" class="input">
					</td>
				</tr>

				<tr>
					<td id="x">
						<label>Phone No. :</label>
					</td> 
							
					<td> 
						<input type="number" name="txtPhone" class="input">
					</td>
				</tr>

				<tr>
					<td id="x">
						<label>Commission :</label>
					</td> 
							
					<td> 
						<input type="number" name="txtCommission" class="input">
					</td>
				</tr>

				<tr>
					<td id="x">
						<label>Salary :</label>
					</td> 
							
					<td> 
						<input type="number" name="txtSalary" class="input">
					</td>
				</tr>

				<tr>
					<td id="x">
						<label>User Type :</label>
					</td> 
							
					<td>
						<select name="txtType" class="input">
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
                        <button id="xy" class="input" type="submit" name="btnRegister">Add</button>
					</td>
				</tr>

			</table>
			</form>
			<?php
				
				if(isset($_POST["btnRegister"]))
				{
					$sql="insert into staff(username,password,firstname,lastname,phoneNumber,commission,salary,type,status) values('{$_POST["txtUsername"]}','{$_POST["txtPassword"]}','{$_POST["txtFName"]}','{$_POST["txtLName"]}','{$_POST["txtPhone"]}','{$_POST["txtCommission"]}','{$_POST["txtSalary"]}','{$_POST["txtType"]}','Active')";
					if($db->query($sql))
					{
						echo "Success";
					}
					else
					{
						echo "Fail";
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