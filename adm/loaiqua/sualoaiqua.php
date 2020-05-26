<?php
	if(isset($_POST['maloaiqua']))
		$maloaiqua=$_POST['maloaiqua'];
		
	$strSQL="SELECT * FROM loai_qua WHERE ma_loai={$maloaiqua}";
	$loaiqua=mysqli_query($link,$strSQL);
	$row=mysqli_fetch_array($loaiqua);
?>
<form action="" method="post" name="themloaiqua">
<table cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
		<td align="center" colspan="2" height="35">
		Sửa Tên Loại Sản Phẩm
		</td>
	</tr>
	<tr>
		<td align="right"  height="30">
				<input name="tenloaiqua" type="text" value="<?php echo $row['ten_loai']; ?>" style="width:200px;" maxlength="30">
		</td>
		<td align="left"  height="30">
				<input name="trangchuyen" type="hidden" value="xlloaiqua" />
				<input name="goihamxuly" type="hidden" value="sualoaiqua" />
				<input name="maloaiqua" type="hidden" value="<?php echo $row['ma_loai']; ?>" />
				
		  		<input type="submit" name="Submit" value="Sửa" style="background:#FFFFFF; width:100px;">
		 </td>
	</tr>
</table>
				
</form>
