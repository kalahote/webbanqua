<?php
	if(isset($_POST['madh']))
	{
		$madon=$_POST['madh'];
		$strSQL1="SELECT * FROM dondathang WHERE ma_dh={$madon}";
		$dondathang=mysqli_query($link,$strSQL1);
		$rowDH=mysqli_fetch_array($dondathang);
			$ma_khach=$rowDH['ma_kh'];
		//lay khach hang
		$strSQL2="SELECT * FROM khach_hang WHERE ma_kh={$ma_khach}";
		$khachhang=mysqli_query($link,$strSQL2);
		$rowKH=mysqli_fetch_array($khachhang);
	}
?>
<table width="750" cellpadding="2" cellspacing="0" border="0" class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="right">
	<tr>
		<th> chi tiết đơn đặt hàng của : <?php echo $rowKH['ho_kh']." ".$rowKH['ten_kh']; ?>
		</th>
	</tr>
	<tr>
		<td>
		<p class="pp">
		<center>Thông tin khách hàng</center>
		<br />
		<table width="490" cellpadding="2" cellspacing="0" border="0" 
		class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="center">
		<tr>
		<td width="190" align="center">
		Tên Người Mua Hàng: </td>
		<td width="300">
		&nbsp;&nbsp;<?php echo $rowKH['ho_kh']." ".$rowKH['ten_kh']; ?>
		</td>
		</tr>
		<tr>
		<td align="center">
		Số Điện Thoại:</td>
		<td>
		&nbsp;&nbsp;<?php echo $rowKH['sdt']; ?>.
		</td>
		</tr>
		<tr>
		<td align="center">Email: </td>
		<td>
		&nbsp;&nbsp;<?php echo $rowKH['email']; ?>.</td>
		</tr>
		<tr>
		<td align="center">
		Địa hỉ Giao Hàng: </td>
		<td>
		&nbsp;&nbsp;<?php echo $rowKH['dia_chi']; ?>.
		</td>
		</tr>
		</table>
		<br />
		<center>Đơn Hàng Bao Gồm:</center>
		<br />
		<table width="490" cellpadding="2" cellspacing="0" border="0" 
		class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="center">
		<tr>
			<td width="40" align="center">STT</td>
			<td width="180" align="center">Tên qua</td>
			<td width="90" align="center">Số Lượng</td>
			<td width="90" align="center">Đơn Giá</td>
			<td width="90" align="center">Thành Tiền</td>
		</tr>
		<?php 
		$i=0;
		$tongtien=0;
		//lay thong tin chi tiet 
		$strSQL3="SELECT * FROM ct_dondathang WHERE ma_dh={$madon}";
		$chi_tiet=mysqli_query($link,$strSQL3);
		
		while($rowCT=mysqli_fetch_array($chi_tiet))
		{
		$i+=1;
		?>
		<tr>
			<td align="center"><?php echo $i; ?></td>
			<td align="center">
				<?php
					//lay ten qua thong qua ma qua
					$strSQL4="SELECT * FROM qua WHERE ma_qua={$rowCT['ma_qua']}";
					$qua=mysqli_query($link,$strSQL4);
					$row4=mysqli_fetch_array($qua);
					
					echo $row4['ten_qua'];
				?>
			</td>
			<td><?php echo $rowCT['sl_dat']; ?></td>
			<td><?php echo $rowCT['gia_ban']; ?></td>
			<td><?php echo $rowCT['gia_ban']*$rowCT['sl_dat']; ?></td>
		</tr>
		<?php 
		$tongtien+=$rowCT['gia_ban']*$rowCT['sl_dat'];
		} ?>
		</table>
		<center>
		<br />
		tổng tiá trị giỏ hàng: <?php echo number_format($tongtien,0,'.','.'); ?> VNĐ
		<br />
		Ngày Yêu Cầu Giao Hàng: <?php echo $rowDH['ngay_gh']; ?>
		<br />
		
		<?php
			if($rowDH['hien_trang']==0)
			{
				echo "<font color='#D14F10'>Đơn Đặt Hàng Này Chưa Giao!</font>";
		?>
		<br /><br />
		<form name="capnhat" action="" method="post">
			  <input type="hidden" name="madh" value="<?php echo $madon; ?>" />
			  <input type="hidden" name="trangchuyen" value="chitiet_dh" />
			  <input type="hidden" name="hientrang" value="1" />
			  <input type="submit" name="Submit" value="Xác Nhận Đã Giao Đơn Hàng Này" style="background:url(../images/ngang.jpg)">
		</form>
		<br />
		<?php } else { 
			echo "<font color='#D14F10'>Đơn Đặt Hàng Này <b>Đã Giao Nhận!</b></font>";
		?>
		<br />
		<a href="#" onclick="xoa_dondathang('<?php echo $madon; ?>','xl_dondathang','xoadh')">Xóa Đơn Đặt Hàng Này</a>
		<?php } ?>
		</center>
		</td>
	</tr>	
</table>
<?php
		//cap nhat don hang

		if(isset($_POST['hientrang']))
		{
			$hientrang=$_POST['hientrang'];
			$madon=$_POST['madh'];
			
			$strSQL="UPDATE dondathang SET hien_trang={$hientrang} WHERE ma_dh={$madon}";
			mysqli_query($link,$strSQL);
		}
		?>
		
<form name="xldathang" action="" method="post">
	<input type="hidden" name="trangchuyen" value="" />
	<input type="hidden" name="goiham" value="xoadh" />
	<input type="hidden" name="madh" value="" />
</form>
<script>
	function xoa_dondathang(ma,trang,hanhdong)
	{
		xldathang.madh.value=ma
		xldathang.trangchuyen.value=trang
		xldathang.goiham.value=hanhdong
		if(confirm('bạn có thực sự muốn xóa đơn đặt hàng này không!'))
		xldathang.submit()
	}		
</script>