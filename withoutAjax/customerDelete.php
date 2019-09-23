<?php
include 'session.php';
$id = $_GET["id"];

$sql="delete from customer where id = '$id';";

if($db->query($sql)){
	header("location:customerView.php?mes=deleted..!");
}
else{
	echo "Fail".$db->error;
}



?>