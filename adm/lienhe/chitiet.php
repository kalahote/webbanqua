<?php
	if(isset($_POST['malienhe']))
		$malienhe=$_POST['malienhe'];
	$strSQL="SELECT * FROM lien_he WHERE ma_lh={$malienhe}";
	$banglienhe=mysqli_query($link,$strSQL);
	$row=mysqli_fetch_array($banglienhe);
	
	$gioi=$row['gioi_nguoi_lh'];
			if($gioi==2)
				$gioi="Nam";
			else if($gioi==3)
				$gioi="Nữ";
			else
				$gioi="Không Xác Định";
?>
<table width="750" cellpadding="2" cellspacing="0" border="0" class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="right">
	<tr>
		<th>
			Chi Tiết Liên Hệ Của Khách Hàng: <?php echo $row['ten_nguoi_lh']; ?>
		</th>
	</tr>
	<tr>
		<td>
			<p class="pp">
				<?php echo $row['noi_dung']; ?>
			</p>
			<p class="pp">
				<span class="demuc">Họ Tên Khách Liên Hệ:</span> <?php echo $row['ten_nguoi_lh']; ?>.
				<br>
				<span class="demuc">Giới Tính:</span> <?php echo $gioi; ?>.
				<br>
				<span class="demuc">Email:</span> <?php echo $row['email_nguoi_lh']; ?>.
				<br>
				<span class="demuc">Số Điện Thoại:</span> <?php echo $row['sdt_nguoi_lh']; ?>.
				<br>
				<span class="demuc">Địa Chỉ:</span> <?php echo $row['diachi_nguoi_lh']; ?>.
				<br>
				<span class="demuc">Thời Gian Liên Hệ:</span> <?php echo $row['ngay_lh']; ?>.
				<br />
			</p>
		</td>
	</tr>
	<tr>
		<td align="center">
			<a href="#" onclick="xoa_lienhe('<?php echo $row['ma_lh']; ?>')">Xóa Liên Hệ Này</a>
		</td>
	</tr>
</table>
<form action="" method="post" name="lienhe">
	<input name="malienhe" type="hidden" value="" />
	<input name="trangchuyen" type="hidden" value="xllienhe" />
	<input name="goihamxuly" type="hidden" value="xoalienhe" />
</form>
<script>
	function xoa_lienhe(malienhe)
	{
		lienhe.malienhe.value=malienhe
		if(confirm('bạn có muốn xóa liên hệ của khách hàng này không..!'))
		lienhe.submit()
	}
</script>