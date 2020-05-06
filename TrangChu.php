<?php
	include "open.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 	<title>Project</title>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	<script type="text/javascript">
 		$(document).ready(function() {
 			$('.sp2').css('display', 'none').fadeIn(2500);
 			$('.thongbao').slideUp(1000).css('color', 'grey').slideDown(1300);
 			$('#div_show').on('click', function(){
 				$('#span_menu').slideToggle(1000);
 				$('#div_menu').toggle(1000);
 			});
 		});
 	</script>
<title>Untitled Document</title>
<style type="text/css">
	body {
		  font-family: cursive ,Arial, "Helvetica Neue", Helvetica, sans-serif;
	}
	#span_thongbao{
		font-size: 30px;
		margin-left: 300px;
		margin-top: 20px; 
		font-weight: 300;
	}
</style>
</head>
<body>
	<div style="height: 800px;">
		<div style="height: 20%;" >
			<?php include("header.php"); ?>
		</div>
		<div style="height: 75%; padding: 40px 0px;">
			<?php 
			if(isset($_SESSION['thongbaothemgiohang'])){
				echo "<span id='span_thongbao'>" . $_SESSION['thongbaothemgiohang'] . "</span>";
				unset($_SESSION['thongbaothemgiohang']);
			}
		?>
   			<?php include("content.php"); ?>
   		</div>
    	<div style="height: 5%">
    		<?php include("footer.php"); ?>
  		</div>
	</div>
</body>
</html>
<?php 
	include "close.php";
?>