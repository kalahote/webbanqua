<?php
	$strSQL="SELECT * FROM khach_hang WHERE ma_kh={$_SESSION['makhachhang']}";
		$khachang=mysqli_query($link,$strSQL);
		$rowtt=mysqli_fetch_array($khachang);
?>
<div style="width:587px; margin-left:3px; margin-right:3px;">
	 <table cellpadding="2" cellspacing="0" border="0" style="border:#CCCCCC 1px solid;border-bottom:none;border-left:none; margin-top:3px;" class="dongbang" align="center">
	 	<tr>
			<td colspan="2" align="center">
				<span class="demuc"> Thông Tin Người Thanh Toán </span>
			</td>
		</tr>
		<tr>	
			<td width="200" align="center">Tên Khách Hàng</td><td width="387" align="center"><?php echo $_SESSION['hovaten']; ?></td>
		</tr>
		<tr>
			<td align="center">Email</td><td align="center"><?php echo $rowtt['email'] ?></td>
		</tr>
		<tr>
			<td align="center">Số Điện Thoại</td><td align="center"><?php echo $rowtt['sdt'] ?></td>
		</tr>
		<tr>
			<td align="center">Địa Chỉ</td><td align="center"><?php echo $rowtt['dia_chi'] ?></td>
	 </table>
</div>
<div style="width:587px; margin-left:3px; margin-right:3px;">
<script>
function kiemtra()
{
	var ngaythang=giaohang.ngaygiao.value;
		
		if(ngaythang=="")
		{
			document.all('baoloi').innerHTML="vui lòng nhập ngày giao hàng!"
			giaohang.ngaygiao.style.backgroundColor='#FFFFCC'
			giaohang.ngaygiao.focus()
			return false
		}
		else
		{
			document.all('loihoten').innerHTML=""
			giaohang.ngaygiao.style.backgroundColor='#FFFFFF'
			
		}
		return true
}
</script>
<form name="giaohang" action="" method="post" onsubmit="return kiemtra()">
	 <table cellpadding="3" cellspacing="0" border="0" style="border:#CCCCCC 1px solid;border-bottom:none;border-left:none; margin-top:3px;" class="dongbang" align="center">
	 	<tr>
			<td colspan="2" align="center">
				<span class="demuc"> Thông Tin Giao Hàng </span>
			</td>
		</tr>
		<tr>	
			<td align="center">Ngày Giao Hàng</td>
			<td>&nbsp;&nbsp;
				<input name="ngaygiao" type="text" id="ngaygiao" style="width:235px;" />
  				<input type="button" name="Button" value="Date" onclick="showCalendar('ngaygiao')" />
				<br />
				<span id="baoloi" style="color:#FF6600;"></span>	
			</td>
		</tr>
		<tr>
			<td width="200" align="center">Nơi Giao Hàng</td><td width="387">&nbsp;&nbsp;
			<textarea name="diachigiao" cols="45" rows="4" style="border-right:none;"><?php echo $rowtt['dia_chi'] ?></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="hidden" name="makhachhang" value="<?php echo $_SESSION['makhachhang']; ?>" />
				<input type="hidden" name="hanhdong" value="thanhtoan" />
				<input type="hidden" name="view" value="dathang" />
				<input type="submit" name="Submit" value="Xác Nhận Thanh Toán" style="background:#FFFFFF;" onclick="kiemtra()">
			</td>
		</tr>
	 </table>	 
</form>
</div>