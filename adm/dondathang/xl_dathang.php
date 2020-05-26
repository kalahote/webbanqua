<?php
$thongbao="";
if(isset($_POST['goiham']))
{
	$lenhsuly=$_POST['goiham'];
	if($lenhsuly=='xoadh')
		$thongbao=xoa_dondathang();
}
//ham xoa don dat hang
function xoa_dondathang()
{	global $link;
	if(isset($_POST['madh']))
		$madh=$_POST['madh'];
	
	//xoa don dat hang
	$strSQL="DELETE FROM dondathang WHERE ma_dh={$madh}";
	mysqli_query($link,$strSQL);
	
	//xoa mat hang khoi chi tiet dat hang
	$strSQL="DELETE FROM ct_dondathang WHERE ma_dh={$madh}";
	mysqli_query($link,$strSQL);
	
	return"Bạn Đã Xóa Thành Công Đơn Đặt Hàng này!";
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
<center><a href="#" onclick="adm_chuyentrang('quanlydondathang')">Bấm Vào Đây Để Về Trang Quản Lý Đặt Hàng</a></center>
<?php
echo "</p>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}
?>