<?php 
	include "../open.php";
	if(isset($_GET['id'])) {
		$id_sp = $_GET['id'];
		$strQuery = "delete from san_pham where id_sp = '$id_sp'";
		mysqli_query($con, $strQuery);
	}
	header("location:admin.php");
	include "../close.php";
?>