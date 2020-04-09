<?php 
	session_start();
	$_SESSION['cart'];
	$_SESSION['dem'] = 0;
	print_r($_POST['soluong']);
	foreach ($_POST['soluong'] as $id_sp => $sl) {
		if($sl == 0){
			unset($_SESSION['cart'][$id_sp]);
		}else{
			$_SESSION['cart'][$id_sp]['sl'] = $sl;
		}
		$_SESSION['dem'] += $sl;
	}
	if(count($_SESSION['cart']) == 0) {
		unset($_SESSION['cart']);
	}
	header("location:../trangchu.php?show=giohang");
?>