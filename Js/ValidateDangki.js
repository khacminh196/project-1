// JavaScript validate đăng kí khách hàng

function check2(){
	var kt = 0;
	var taikhoan = document.getElementById("tkk");
	var loi_taikhoan = document.getElementById("loi_tk");
	var giatri_taikhoan = taikhoan.value;
	var regex_taikhoan = /^[A-Za-z0-9]{6,}$/;
	if(regex_taikhoan.test(giatri_taikhoan)==false){
		loi_taikhoan.innerHTML = "Tài khoản không hợp lệ";
		kt++;
	}
	else{
		loi_taikhoan.innerHTML = "";
	}
	
	var mk = document.getElementById("mkk");
	var loi_matkhau = document.getElementById("loi_mk");
	var giatri_mk = mk.value;
	var regex_mk = /^[A-Za-z0-9]{6,}$/;
	if(regex_mk.test(giatri_mk)==false){
		loi_matkhau.innerHTML = "Mật khẩu tối thiểu 6 kí tự và chứa ít nhất 1 chữ in hoa";
		kt++
	}
	else{
		loi_matkhau.innerHTML = "";
	}
	
	var ten = document.getElementById("hoten");
	var loi_ten = document.getElementById("loi_ten");
	var giatri_ten = ten.value;
	var regex_ten = /^[A-Za-z\s]{6,}$/
	if(regex_ten.test(giatri_ten)==false){
		loi_ten.innerHTML = "Họ tên không hợp lệ";
		kt++;
	}
	else{
		loi_ten.innerHTML = "";
	}
	
	var gioitinh = [];
	var demgt = 0;
	gioitinh = document.getElementsByName("gt");
	var loi_gt = document.getElementById("loi_gt");
	for(var i = 0; i < gioitinh.length; i++){
		if(gioitinh[i].checked==true){
			demgt++
		}
	}
	if(demgt == 0){
		loi_gt.innerHTML = "Không được để trống";
	}
	else{
		loi_gt.innerHTML = "";
	}
	
	var dia_chi = document.getElementById("diachi");
	var loi_dia_chi = document.getElementById("loi_dia_chi");
	var giatri_diachi = dia_chi.value;
	var regex_diachi = /^[A-Za-z0-9\s]{10,}$/;
	if(regex_diachi.test(giatri_diachi)==false){
		loi_dia_chi.innerHTML = "Địa chỉ không hợp lệ";
		kt++;
	}
	else{
		loi_dia_chi.innerHTML = "";
	}
	
	var sdt = document.getElementById("dt");
	var loi_sdt = document.getElementById("loi_sdt");
	var regex_sdt = /^0[0-9]{9}$/;
	var giatri_sdt = sdt.value;
	if(regex_sdt.test(giatri_sdt) == false){
		loi_sdt.innerHTML = "Số điện thoại không hợp lệ";
	}
	else{
		loi_sdt.innerHTML = "";
	}
		
	if(kt == 0){
		return true;
	}
	else{
		return false;
	}
}