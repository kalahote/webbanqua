<?php
$thongbao="";
//su ly goi ham
	if(isset($_POST['goiham']))
	{
		$hamthucthi=$_POST['goiham'];
			if($hamthucthi=='themadmin')
				$thongbao=them_admin();
				
			if($hamthucthi=='xoaadmin')
				$thongbao=xoa_admin();
			
			if($hamthucthi=='suaadmin')
				$thongbao=sua_admin();
	}
//ham xoa admin
function xoa_admin()
{
	global $link;
	if(isset($_POST['maadmin']))
		$maadmin=$_POST['maadmin'];
	//kiem tra quyen han
		if($maadmin=='1')
			return "Không Thể Xóa Admin";
	//khong thoa man
	$strSQL="DELETE FROM adm WHERE ma_adm='{$maadmin}'"	;
	mysqli_query($link,$strSQL);
		return "Xóa Thành Công Tài Khoản Này!";
	
}
//ham them admin
function them_admin()
{
	global $link;
	if(isset($_POST['tendangnhap']))
		$tendangnhap=$_POST['tendangnhap'];
	
	if(isset($_POST['matkhau']))
		$matkhau=$_POST['matkhau'];
		
	if(isset($_POST['quadmin']))
		$quadmin=$_POST['quadmin'];
		
	if(isset($_POST['tenadmin']))
		$tenadmin=$_POST['tenadmin'];
	
	if(isset($_POST['gioitinh']))
		$gioitinh=$_POST['gioitinh'];
	
	//kiem tra ten dang nhap co bi trung hay khong
	$strSQL="SELECT COUNT(*) FROM adm WHERE ten_dn='{$tendangnhap}'";
	$kiem_tra=mysqli_query($link,$strSQL);
	$row=mysqli_fetch_array($kiem_tra);
	
	if($row[0]>0)
		return "Tên Đăng Nhập Này Đã Tồn Tại";
		
	//neu tqua man tiep tuc
	$strSQL="INSERT INTO adm(ten_dn,mat_khau,ho,ten,gioi_tinh) VALUES('{$tendangnhap}','{$matkhau}','{$quadmin}','{$tenadmin}','{$gioitinh}')";
	mysqli_query($link,$strSQL);
	
		return "Thêm Thành Công Quản Trị Viên";
}
// ham sua thong tin
function sua_admin()
{
	global $link;
	if(isset($_POST['maadmin']))
		$maadmin=$_POST['maadmin'];
		
	if(isset($_POST['matkhau']))
		$matkhau=$_POST['matkhau'];
		
	if(isset($_POST['quadmin']))
		$quadmin=$_POST['quadmin'];
		
	if(isset($_POST['tenadmin']))
		$tenadmin=$_POST['tenadmin'];
	
	if(isset($_POST['gioitinh']))
		$gioitinh=$_POST['gioitinh'];
	
	$strSQL="UPDATE adm SET mat_khau='{$matkhau}',ho='{$quadmin}',ten='{$tenadmin}',gioi_tinh='{$gioitinh}' WHERE ma_adm={$maadmin}";
	mysqli_query($link,$strSQL);
	
	return "Đã Sửa Thành Công Thông Tin Tài KHoản Này!";
}

//in thong bao

if($thongbao !="")
{
echo "<div style='width:587px; margin-left:3px; margin-right:3px;'>";
echo "<table width='587' cellpadding='0' cellspacing='0' border='0' style='border:#E9E9E9 1px solid; margin-top:3px;'>";
echo "<tr>";
echo "<td>";

echo "<p class='pp'><center><span style='color:#FF9900;'>{$thongbao}</span>"; 
echo "<br />";
echo "<br />";
?>
<center><a href="#" onclick="adm_chuyentrang('quanlyadmin')">Bấm Vào Đây Để Về Trang Quản Lý Admin</a></center>
<?php
echo "</p>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}
?>