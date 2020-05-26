
<form action="" method="post" name="themadmin">
  <table width="750" border="0" cellpadding="2" cellspacing="0" class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="right">
    <tr>
		<th colspan="2" align="center">
		Thêm Quản Trị Viên		</th>
	</tr>
	<tr>
		<td width="150">Tên Đăng Nhập:</td>
		<td width="600">
		<input name="tendangnhap" type="text" value="" maxlength="30" style="width:200px;">		</td>
	</tr>
	<tr>
		<td>Mật Khẩu:</td>
		<td>
		<input name="matkhau" type="password" value="" maxlength="30" style="width:200px;">		</td>
	</tr>
	<tr>
		<td colspan="2">
			&nbsp;&nbsp;Họ:&nbsp;&nbsp;<input name="quadmin" type="text" value="" maxlength="30" style="width:150px;">
			&nbsp;&nbsp;&nbsp;&nbsp;Tên:&nbsp;&nbsp;<input name="tenadmin" type="text" value="" maxlength="30" style="width:150px;">
			&nbsp;&nbsp;&nbsp;&nbsp;Giới Tính:  <select name="gioitinh">
													<option value="1">Không Xác Định</option>
													<option value="2" selected="selected">Nam</option>
													<option value="3">Nữ</option>
                              					  </select>		</td>
	</tr>
	<tr>
	  <td colspan="2" align="center">
	    <input name="goiham" type="hidden" value="themadmin" />
		<input name="trangchuyen" type="hidden" value="xladmin" />
		
	    <input type="submit" name="Submit" value="Hoàn Tất">
	  </td>
    </tr>
</table>
</form>