<?php
	if(isset($_POST['makhachhang']))
	{
		$makhachhang=$_POST['makhachhang'];
		$strSQL="SELECT * FROM khach_hang WHERE ma_kh={$makhachhang}";
		$khachhang=mysqli_query($link,$strSQL);
		$rowKH=mysqli_fetch_array($khachhang);
		
		$gioi=$rowKH['gioi_tinh'];
			if($gioi==2)
				$gioi="Nam";
			else if($gioi==3)
				$gioi="Nữ";
			else
				$gioi="Không Xác Định";
	}
?>
<table width="750" cellpadding="2" cellspacing="0" border="0" class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="right">
	<tr>
		<th>
			Thông Tin Chi Tiết Của Khách Hàng: <?php echo $rowKH['ho_kh']." ".$rowKH['ten_kh']; ?>
		</th>
	</tr>
	<tr>
		<td>
			<p class="pp">
				<span class="demuc">Tên Tài Khoản:</span> <?php echo $rowKH['ten_dn']; ?>
				<br />
				<span class="demuc">Mật Khẩu:</span> <?php echo $rowKH['mat_khau']; ?>
				<br /> 
				<span class="demuc">Họ Và Tên:</span> <?php echo $rowKH['ho_kh']." ".$rowKH['ten_kh']; ?>
				<br />
				<span class="demuc">Địa Chỉ:</span> <?php echo $rowKH['dia_chi']; ?>
				<br />
				<span class="demuc">Số Điện Thoại:</span> <?php echo $rowKH['sdt']; ?>
				<br />
				<span class="demuc">Email:</span> <?php echo $rowKH['email']; ?>
				<br />
				<span class="demuc">Giới Tính:</span> <?php echo $gioi; ?>
			</p>	
			</div>
		</td>
	</tr>
	<tr>
		<td align="center">
			<a href="#" onClick="xoa_khachhang('<?php echo $rowKH['ma_kh'] ?>')">Xóa Khách Hàng Này</a>
		</td>
	</tr>
</table>
<form name="khachhang" method="post" action="">
	<input name="makhachhang" type="hidden" value="" />
	<input name="trangchuyen" type="hidden" value="xlkhachhang" />
	<input name="goihamxuly" type="hidden" value="xoakhachhang" />
</form>
<script>
function xoa_khachhang(makhachhang)
	{
		khachhang.makhachhang.value=makhachhang
		if(confirm("bạn có thực sự muốn xóa khách hàng này không"))
		khachhang.submit()
	}
</script>