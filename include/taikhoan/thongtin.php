<?php

	if(isset($_POST['makhachhang']))
	{
		$makhachhang=$_POST['makhachhang'];
		
		$strSQL="SELECT * FROM khach_hang WHERE ma_kh={$makhachhang}";
		$khachang=mysqli_query($link,$strSQL);
		$row=mysqli_fetch_array($khachang);
		
		$gioi=$row['gioi_tinh'];
			if($gioi==2)
				$gioi="Nam";
			else if($gioi==3)
				$gioi="Nữ";
			else
				$gioi="Không Xác Định";
	}
?>
<div style="width:587px; margin-left:3px; margin-right:3px;">

  <table width="587" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="height:25px; background:url(images/trang.jpg) repeat-x;" align="center" class="ht" colspan="3">
				Thông Tin Thành Viên
			</td>
		</tr>
		<tr>
			<td>
				<?php include('xl_taikhoan.php');?>
				<?php if(isset($_POST['capnhat']))
					{
						$trangcapnhat=$_POST['capnhat'];
						if($trangcapnhat=='trangcapnhat')
							include_once('manhinhcapnhat.php');		
					}
				 ?>
			</td>
		</tr>
		<tr>	
			<td align="center">
			<div style="width:450; border:#CCCCCC 1px solid; margin-top:10px;">
			<p class="pp">
				<span class="demuc">Tên Tài Khoản:</span> <?php echo $row['ten_dn']; ?>
				<br />
				<span class="demuc">Mật Khẩu:</span> <?php echo $row['mat_khau']; ?>
				<br /> 
				<span class="demuc">Họ Và Tên:</span> <?php echo $row['ho_kh']." ".$row['ten_kh']; ?>
				<br />
				<span class="demuc">Địa Chỉ:</span> <?php echo $row['dia_chi']; ?>
				<br />
				<span class="demuc">Số Điện Thoại:</span> <?php echo $row['sdt']; ?>
				<br />
				<span class="demuc">Email:</span> <?php echo $row['email']; ?>
				<br />
				<span class="demuc">Giới Tính:</span> <?php echo $gioi; ?>
			</p>	
			</div>
			</td>
		</tr>
		<tr>
			<td align="center">
				<a href="#" onClick="capnhat_submit('trangcapnhat','<?php echo $row['ma_kh']; ?>')">Thay Đổi Thông Tin</a>
			</td>
				
		</tr>
  </table>
</div>
<form action="" method="post" name="fromcapnhat">
	<input type="hidden" name="capnhat" value="">
	<input type="hidden" name="makhachhang" value="" />
	<input name="view" type="hidden" value="thongtintaikhoan" />
</form>
<script>
	function capnhat_submit(thamso,makh)
	{
		fromcapnhat.capnhat.value=thamso
		fromcapnhat.makhachhang.value=makh
		fromcapnhat.submit()
	}
	
</script>