<?php
	$thongbao="";
		if(isset($_POST['goihamxuly']))
		{
			$lenhsuly=$_POST['goihamxuly'];		
			if($lenhsuly=='themqua')
				$thongbao=them_qua();	
			else if($lenhsuly=='xoaqua')
				$thongbao=xoa_qua();	
			else if($lenhsuly=='suaqua')
				$thongbao=sua_qua();				
		}
//ham xoa qua
function xoa_qua()
{
	global $link;
		if(isset($_POST['maqua']))
		$maqua=$_POST['maqua'];
		
		//kiem tra loai qua co ton tai trong chi tiet don dat hang nao khong
		$strSQL="SELECT COUNT(*) FROM ct_dondathang WHERE ma_qua ='{$maqua}'";
		$ctdathang=mysqli_query($link,$strSQL);
		$row=mysqli_fetch_array($ctdathang);
		if($row[0]>0)
			return "Bạn Không Thể Xóa qua Đã Có Trong Chi Tiết Hóa Đơn!";
		//neu khong co the xoa
		$strSQL="DELETE FROM qua WHERE ma_qua={$maqua}";
		mysqli_query($link,$strSQL);
		
		return "Đã Xóa Thành Công";
}		
//ham them qua
function them_qua()
{
	global $link;
		if(isset($_POST['tenqua']))
			$tenqua=$_POST['tenqua'];
			
		if(isset($_POST['loaiqua']))
			$loaiqua=$_POST['loaiqua'];	
		
		if(isset($_POST['giaqua']))
			$giaqua=$_POST['giaqua'];
			
		if(isset($_POST['mota']))
			$mota=$_POST['mota'];
			
		if(isset($_POST['hinhanh']))
			$hinhanh=$_POST['hinhanh'];
		
		if(isset($_POST['trangthai']))
			$trangthai=$_POST['trangthai'];
			
		//kiem tra xem ten qua co bi trung hay khong
		$strSQL="SELECT COUNT(*) FROM qua WHERE ten_qua='{$tenqua}'";
		$qua=mysqli_query($link,$strSQL);
		$row=mysqli_fetch_array($qua);
		
		if($row[0]>0)
			return "Tên qua Đã Tồn Tại, Bạn Hãy Chọn Tên Khác";
		//neu khong trung ten luu vao csdl
		
		$strSQL="INSERT INTO qua(ten_qua,ma_loai,gia,mo_ta,hinh_anh,trang_thai) 
			VALUES ('{$tenqua}',{$loaiqua},'{$giaqua}','{$mota}','{$hinhanh}','{$trangthai}')";
		mysqli_query($link,$strSQL);
			
			return "Đã Thêm Thành Công qua Váo Cơ Sở Dữ Liệu";
		
}
function sua_qua()
{
	global $link;
		if(isset($_POST['maqua']))
			$maqua=$_POST['maqua'];
			
		if(isset($_POST['tenqua']))
			$tenqua=$_POST['tenqua'];
			
		if(isset($_POST['loaiqua']))
			$loaiqua=$_POST['loaiqua'];	
		
		if(isset($_POST['giaqua']))
			$giaqua=$_POST['giaqua'];
			
		if(isset($_POST['mota']))
			$mota=$_POST['mota'];
			
		if(isset($_POST['hinhanh']))
			$hinhanh=$_POST['hinhanh'];
			
		if(isset($_POST['trangthai']))
			$trangthai=$_POST['trangthai'];
			
		//kiem tra xem ten qua co bi trung hay khong
		//$strSQL="SELECT COUNT(*) FROM qua WHERE ten_qua='{$tenqua}'";
		//$qua=mysql_query($strSQL,$ung);
		//$row=mysql_fetch_array($qua);
		//if($row[0]>0)
			//return "Tên qua Đã Tồn Tại, Bạn Hãy Chọn Tên Khác";
		
		//neu khong trung ten luu thong tin da thay  vao csdl
		
		$strSQL="UPDATE qua SET ten_qua='{$tenqua}',ma_loai={$loaiqua},gia='{$giaqua}',mo_ta='{$mota}',hinh_anh='{$hinhanh}',trang_thai='{$trangthai}'
			WHERE ma_qua={$maqua}";
		mysqli_query($link,$strSQL);
			
			return "Đã Lưu Thành Công Thay Đỗi Của Bạn";
		
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
<center><a href="#" onclick="adm_chuyentrang('quanlyqua')">Bấm Vào Đây Để Về Trang Quản Lý qua</a></center>
<?php
echo "</p>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}
?>