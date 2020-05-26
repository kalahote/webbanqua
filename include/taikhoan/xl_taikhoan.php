<?php
$thongbaotaikhoan="";
if(isset($_POST['goiham']))
{
	$goiham=$_POST['goiham'];
		if($goiham=='dangkytaikhoan')
			$thongbaotaikhoan=dangky_taikhoan();
		else if($goiham=='capnhattaikhoan')
			$thongbaotaikhoan=capnhat_taikhoan();
		else if($goiham=='timmatkhau')
			$thongbaotaikhoan=timmatkhau_taikhoan();
}
function dangky_taikhoan()
{
	global $link;
	
	if(isset($_POST['tendangnhap']))
		$tendangnhap=$_POST['tendangnhap'];
		$_SESSION['tendangnhap']=$tendangnhap;
		
	if(isset($_POST['matkhau']))
		$matkhau=$_POST['matkhau'];
		$_SESSION['matkhau']=$matkhau;
		
	if(isset($_POST['ho']))
		$ho=$_POST['ho'];
		$_SESSION['ho']=$ho;
		
	if(isset($_POST['ten']))
		$ten=$_POST['ten'];
		$_SESSION['ten']=$ten;
		
	if(isset($_POST['sdt']))
		$sdt=$_POST['sdt'];
		$_SESSION['sdt']=$sdt;
		
	if(isset($_POST['email']))
		$email=$_POST['email'];
		$_SESSION['email']=$email;
		
	if(isset($_POST['diachi']))
		$diachi=$_POST['diachi'];
		$_SESSION['diachi']=$diachi;
		
	if(isset($_POST['gioitinh']))
		$gioitinh=$_POST['gioitinh'];
		//ma xac nhan
		if(isset($_POST['code']));
		{
		$recode=$_POST['code'];
		if($recode!=$_SESSION['maxacnhan'])
		return "Bạn Nhập Sai Mã Xác Nhận Vui Lòng Nhập Lại! <br /> <strong><a href="."\"#\""."onclick="."\"dangky_onsubmit('dangky')"."\">"
		."Bấm Vào Đây Để Nhập Lại Mã Xác Nhận</a></strong>";
		}
		//kiem tra ten dang nhap co bi trung hay khong
		$strSQL="SELECT COUNT(*) FROM khach_hang WHERE ten_dn='{$tendangnhap}'";
		$kiem_ten=mysqli_query($link,$strSQL);
		$rowK=mysqli_fetch_array($kiem_ten);
		if($rowK[0]>0)
			return "Tên Đăng Nhập Này Đã Tồn Tại <br /> <strong><a href="."\"#\""."onclick="."\"dangky_onsubmit('dangky')"."\">"
		."Bấm Vào Đây Để Nhập Lại</a></strong>";
	
	//neu khong nhap du lieu vao csdl
	$strSQL="INSERT INTO khach_hang(ho_kh,ten_kh,sdt,dia_chi,email,gioi_tinh,ten_dn,mat_khau)
		VALUES ('{$ho}','{$ten}','{$sdt}','{$diachi}','{$email}','{$gioitinh}','{$tendangnhap}','{$matkhau}')";
	mysqli_query($link,$strSQL);
	return "Bạn Đã Đăng Ký THành Công..!";
	
}

function capnhat_taikhoan()
{
	global $link;
	if(isset($_POST['makhachhang']))
		$makhachhang=$_POST['makhachhang'];
		
	if(isset($_POST['matkhau']))
		$matkhau=$_POST['matkhau'];
		
	if(isset($_POST['ho']))
		$ho=$_POST['ho'];
		
	if(isset($_POST['ten']))
		$ten=$_POST['ten'];
		
	if(isset($_POST['sdt']))
		$sdt=$_POST['sdt'];
		
	if(isset($_POST['email']))
		$email=$_POST['email'];
		
	if(isset($_POST['diachi']))
		$diachi=$_POST['diachi'];
		
	if(isset($_POST['gioitinh']))
		$gioitinh=$_POST['gioitinh'];
		
	$strSQL="UPDATE khach_hang SET ho_kh='{$ho}',ten_kh='{$ten}',sdt='{$sdt}',dia_chi='{$diachi}',email='{$email}',
	gioi_tinh='{$gioitinh}',mat_khau='{$matkhau}' WHERE ma_kh='{$makhachhang}'";
	mysqli_query($link,$strSQL);
	return "Bạn Đã Thay Đổi Thông Tin THành Công..!";

}
function timmatkhau_taikhoan()
{
	
	global $link;
	if(isset($_POST['tendangnhap']) && isset($_POST['email']))
	{
		$tendangnhap=$_POST['tendangnhap'];
		$email=$_POST['email'];
		
		$strSQL="SELECT * FROM khach_hang WHERE ten_dn='{$tendangnhap}' AND email='{$email}'";
		$khachhang=mysql_query($strSQL,$ung);
		
		if(mysqli_num_rows($khachhang)>0)
		{
			$row=mysqli_fetch_array($khachhang);
			$_SESSION['matkhau']=$row['mat_khau'];
			return "Mật Khẩu Của Bạn Là: "."<span style='color:#333333;'>".$_SESSION['matkhau']."</span>";
		}
		else
		{
			return "Thông Tin Cung Cấp Không Chính Xác";
		}
	}

}

//in thong bao

if($thongbaotaikhoan !="")
{
echo "<div style='width:587px; margin-left:3px; margin-right:3px;'>";
echo "<table width='587' cellpadding='0' cellspacing='0' border='0' style='border:#E9E9E9 1px solid; margin-top:3px;'>";
echo "<tr>";
echo "<td>";

echo "<p class='pp'><center><span style='color:#FF9900;'>{$thongbaotaikhoan}</span>"; 
echo "<br>";
echo "<a href='index.php' target='_parent'>Bấm Vào Đây Để Về Trang Chủ</a></center></p>";

echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}

?>
