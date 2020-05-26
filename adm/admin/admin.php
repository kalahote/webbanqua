<?php
	if($_SESSION['phanquyen']!='admin')
	{
	?>
	<p class='pp'><center>Bạn Không Đủ Quyền Quản Lý Mục Này
	<br />
	<a href="index.php">Bấm Vào Đậy Để Quay Lại Trang Chủ!</a>
	</center>
	</p>
<?php 
	} 
	else
	{
	$strSQL="SELECT * FROM adm ORDER BY ma_adm desc";
	$admin=mysqli_query($link,$strSQL);
	
?>
	<?php
		if(isset($_POST['chen']))
		{
			$chentrang=$_POST['chen'];
			if($chentrang=='themadmin')
				include_once('admin/themadmin.php');
			if($chentrang=='suaadmin')
				include_once('admin/suaadmin.php');
		}
	?>
	<table width="750" cellpadding="2" cellspacing="0" border="0" class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="right">
	<tr>
		<th width="40" align="center" style="border-left:#66A111 solid 1px;">
			STT
		</th>
		<th width="150" align="center">
			Tên Đăng Nhập
		</th>
		<th width="360">
			Tên Thật
		</th>
		<th width="200" colspan="2" style="background:#FFFFFF;" align="center">
			<a href="#" onclick="them_sua('themadmin')">Thêm Quản Trị Viên</a>
		</th>
	</tr>
	<?php $i=0; ?>
		<?php while($rowADM=mysqli_fetch_array($admin)) { $i+=1; ?>
	<tr>
	<?php 
		//xu ly mau cho dong
			if($i%2==0) 
				$mausac="style='background:#F8F8F8;'";
			 else 
			 	$mausac="style='background:#FFFFFF;'";
	?> 
		<td <?php echo $mausac; ?> >
			<?php echo $i; ?>
		</td>
		<td <?php echo $mausac; ?> >
			<a href="#" onclick="them_sua('suaadmin','<?php echo $rowADM['ma_adm']; ?>')"><?php echo $rowADM['ten_dn']; ?></a>
		</td>
		<td <?php echo $mausac; ?> >
			<a href="#" onclick="them_sua('suaadmin','<?php echo $rowADM['ma_adm']; ?>')"><?php echo $rowADM['ho']." ".$rowADM['ten']; ?></a>
		</td>
		<td width="100" align="center" <?php echo $mausac; ?>>
			<a href="#" onclick="them_sua('suaadmin','<?php echo $rowADM['ma_adm']; ?>')">Sửa</a>
		</td>
		<td width="100" align="center" <?php echo $mausac; ?>>
			<a href="#" onclick="xoa_admin('<?php echo $rowADM['ma_adm']; ?>')" style="color:#999">Xóa</a>
		</td>
	</tr>
		<?php } ?>
	
</table>
<?php } ?>
<form name="chentrang" method="post" action="">
	<input type="hidden" name="chen" value="" />
	<input name="trangchuyen" type="hidden" value="quanlyadmin" />
	<input type="hidden" name="maadmin" value="" />
</form>
<form name="xoaadmin" method="post" action="">
	<input name="goiham" type="hidden" value="xoaadmin" />
	<input name="trangchuyen" type="hidden" value="xladmin" />
	<input name="maadmin" type="hidden" value="" />
</form>
<script>
	function them_sua(trang,maadm)
	{
		chentrang.chen.value=trang
		chentrang.maadmin.value=maadm
		chentrang.submit()
	}
	function xoa_admin(maadmin)
	{
		xoaadmin.maadmin.value=maadmin
		if(confirm('bạn có thực sự muốn xóa tài khoản này!'))
		xoaadmin.submit()
		
	}
</script>