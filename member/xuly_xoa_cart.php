<?php 
	session_start();
	if (isset($_SESSION['cart'])) {
		if(isset($_GET['xoa'])) {
			echo "Xoa de";
			unset($_SESSION['cart']);
			$_SESSION['dem'] = 0;
		}
		else{	
			$id_sp = $_GET['id_sp'];
			$_SESSION['dem'] -= $_SESSION['cart'][$id_sp]['sl'];
			unset($_SESSION['cart'][$id_sp]);
			if(count($_SESSION['cart']) == 0) {
				unset($_SESSION['cart']);
			}
		}
			header("location:../trangchu.php?show=giohang");
	}else{
		header("location:../trangchu.php");
	}
?>