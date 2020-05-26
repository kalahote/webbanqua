
<?php
	$strSQL="SELECT * FROM loai_qua";
	$loai_qua=mysqli_query($link,$strSQL);
	
	//phan hien thi trang them va sua
	if(isset($_POST['chentrang']))
	{
		$chucnang=$_POST['chentrang'];
		if($chucnang=='themloaiqua')
			include_once('loaiqua/themloaiqua.php');
		if($chucnang=='sualoaiqua')
			include_once('loaiqua/sualoaiqua.php');
	}
?>

<table width="750" cellpadding="2" cellspacing="0" border="0" class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="right">
	<tr>
		<th width="40" align="center" style="border-left:#66A111 solid 1px;">
			STT
		</th>
		<th width="90" align="center">
			Mã Loại Quả
		</th>
		<th width="420">
			Tên Loại Quả
		</th>
		<th width="200" colspan="2" style="background:#FFFFFF;" align="center">
			<a href="#" onclick="goithem_sua('themloaiqua')">Thêm Loại Quả Mới</a>
		</th>
	</tr>
	<?php $i=0; ?>
		<?php while($row=mysqli_fetch_array($loai_qua)) { $i+=1; ?>
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
			<?php echo $row['ma_loai']; ?>
		</td>
		<td <?php echo $mausac; ?> >
			<a href="#" onclick="goithem_sua('sualoaiqua',<?php echo $row['ma_loai']; ?>)"><?php echo $row['ten_loai']; ?></a>
		</td>
		<td width="100" align="center" <?php echo $mausac; ?>>
			<a href="#" onclick="goithem_sua('sualoaiqua',<?php echo $row['ma_loai']; ?>)">Sửa</a>
		</td>
		<td width="100" align="center" <?php echo $mausac; ?>>
			<a href="#" onclick="xoa_loaiqua(<?php echo $row['ma_loai']; ?>)">Xóa</a>
		</td>
	</tr>
		<?php } ?>
	
</table>

<form action="" method="post" name="loaiqua">
	<input name="maloaiqua" type="hidden" value="" />
	<input name="trangchuyen" type="hidden" value="xlloaiqua" />
	<input name="goihamxuly" type="hidden" value="xoaloaihang" />
</form>
<form action="" method="post" name="themvssua">
	<input name="chentrang" type="hidden" value="" />
	<input name="maloaiqua" type="hidden" value="" />
	<input name="trangchuyen" type="hidden" value="quanlyloaiqua" />
</form>
<script>
	function xoa_loaiqua(maloaiqua)
	{
		loaiqua.maloaiqua.value=maloaiqua
		if(confirm('bạn có muốn xóa mục này không..!'))
		loaiqua.submit()
	}
	function goithem_sua(trangthem,maloaqua)
	{
		themvssua.chentrang.value=trangthem
		themvssua.maloaiqua.value=maloaqua
		themvssua.submit()
	}

</script>
