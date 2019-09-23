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
						<label>Item Name : </label>
					</td> 
							
					<td> 
						<input type="text"  name="txtName" class="input"> <br>
					</td>
				</tr>

				<tr>
					<td id="x">
						<label>Type : </label>
					</td> 
							
					<td> 
						<select name="txtType" class="input">
							<option value="Item">Item</option>
							<option value="Service">Service</option>
						</select>

					</td>
				</tr>

				<tr>
					<td id="x">
						<label>Buying Cost : </label>
					</td> 
							
					<td> 
						<input type="text" name="txtCost" class="input">
					</td>
				</tr>				
				
				<tr>
					<td id="x">
						<label>Qty :</label>
					</td> 
							
					<td> 
						<input type="text" name="txtQty" class="input">
					</td>
				</tr>

				<tr>
					<td id="x">
						<label>Selling Price :</label>
					</td> 
							
					<td> 
						<input type="number" name="txtPrice" class="input">
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
					$sql="insert into items(Name,Type,cost,qty,price,status) values('{$_POST["txtName"]}','{$_POST["txtType"]}','{$_POST["txtCost"]}','{$_POST["txtQty"]}','{$_POST["txtPrice"]}','Active')";
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
					header("location:itemView.php");
				}
				
			?>
		</td>
	</tr>
		</table>
	</body>
	
	</html>