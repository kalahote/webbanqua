<?php 
	$strSQL="SELECT * FROM loai_qua";
	$loaiqua=mysqli_query($link,$strSQL);

?>
<form action="" method="post" name="themqua">
  <table width="750" height="132" border="0" cellpadding="2" cellspacing="0" class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="right">
    <tr>
		<th colspan="2" align="center">
		Thêm Quả Mới		</th>
	</tr>
	<tr>
      <td colspan="2" align="left">
	  		&nbsp;&nbsp;Tên Quả:
        		<input name="tenqua" type="text" id="tenqua" maxlength="30" style="width:180px;" />
        	&nbsp;&nbsp;Loại Quả:
				<select name="loaiqua">
					<?php while($row=mysqli_fetch_array($loaiqua)) { ?>
					<option value="<?php echo $row['ma_loai']; ?>"><?php echo $row['ten_loai']; ?></option>
					<?php } ?>
        		</select>
			&nbsp;&nbsp;Giá:
          	  	<input name="giaqua" type="text" id="giaqua" maxlength="30" style="width:100px;" />
			&nbsp;&nbsp;&nbsp;Trạng Thái: 
				<select name="trangthai">
						<option value="0">Bình Thường</option>
						<option value="1">Đặc Biệt</option>
        		</select>
		</td>
    </tr>
    <tr>
      <td width="100">&nbsp;&nbsp;Mô Tả </td>
      <td width="650">
	  	<textarea name="mota" cols="104" rows="4" style="border-right:none;"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;&nbsp;Hình Ảnh </td>
      <td>
	  	<input name="hinhanh" type="text" id="hinhanh" maxlength="50" style="width:400px;" >
  		<input type="button" name="Button" value="Upload" onClick="window.open('qua/Upload.php','','width=500,height=150, status=false')">	  </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
	  	<input name="trangchuyen" type="hidden" value="xlqua" />
		<input name="goihamxuly" type="hidden" value="themqua" />
		
		<input type="reset" name="Submit2" value="Làm Lại" />
        <input type="submit" name="Submit" value="Thêm Mới" />    
	  </td>
    </tr>
  </table>
</form>