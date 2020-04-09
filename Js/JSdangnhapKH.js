// JavaScript đăng nhập khách hàng
	function check(){
		var dem = 0;
		var userr = document.getElementById("user");
		var loi_user = document.getElementById("loi_user");
		var giatri_user = userr.value;
		var regex_user = /^[A-Za-z0-9]{6,}$/;
		if(regex_user.test(giatri_user)==false){
			loi_user.innerHTML = "Tên đăng nhập hoặc mật khẩu không hợp lệ";
			dem++;
		}
		else{
			loi_user.innerHTML = "";
		}
		
		var passs = document.getElementById("pass");
		var loi_user = document.getElementById("loi_user");
		var giatri_pass = passs.value;
		var regex_pass = /^[A-Za-z0-9]{6,}$/;
		if(regex_pass.test(giatri_pass)==false){
			loi_user.innerHTML = "Tên đăng nhập hoặc mật khẩu không hợp lệ";
			dem++;
		}
		else{
			loi_pass.innerHTML = "";
		}
		if(dem ==0){
			return true;
		}
		else{
			return false;
		}
	}
