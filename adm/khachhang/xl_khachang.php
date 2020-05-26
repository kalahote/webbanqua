<?php
$thongbao="";
	if(isset($_POST['goihamxuly']))
	{
		$lenhthucthi=$_POST['goihamxuly'];
		if($lenhthucthi=='xoakhachhang')
			$thongbao=xoa_khachhang();
		
	}
//ham xoa khach hang
function xoa_khachhang()
{
	global $link;
	if(isset($_POST['makhachhang']))
		$makhachhang=$_POST['makhachhang'];
	
	$strSQL="DELETE FROM khach_hang WHERE ma_kh={$makhachhang}";
	mysqli_query($link,$strSQL);
	
	return "Bạn Đã Xóa Thành Công Khách Hàng Này!";
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
<center><a href="#" onclick="adm_chuyentrang('quanlykhachhang')">Bấm Vào Đây Để Về Trang Quản Lý Khách Hàng</a></center>
<?php
echo "</p>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}

?>
