<?php
	if(isset($_POST['matintuc']))
	{
		$matintuc=$_POST['matintuc'];
		$strSQL="SELECT * FROM tin_tuc WHERE ma_tt={$matintuc}";
		$tintuc=mysqli_query($link,$strSQL);
		$rowTT=mysqli_fetch_array($tintuc);
	}
?>
<table width="750" cellpadding="2" cellspacing="0" border="0" class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="right">
	<tr>
		<th>
			Sửa Tin Tức Đã Đăng
		</th>
	</tr>
	<tr>
		<td>
		  <form name="themtintuc" method="post" action="">
		  	<table width="700" border="0" align="center" cellpadding="2" cellspacing="0"
				class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid; margin-top:10px; margin-bottom:10px;">
              <tr>
                <td>&nbsp;&nbsp;Tiêu Đề</td>
                <td>
                  <input name="tieudetintuc" type="text" id="tieudetintuc" maxlength="50" style="width:300px;" 
				  	value="<?php echo $rowTT['tieu_de']; ?>">
                </td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp;Ảnh Minh Họa</td>
                <td>
                 	<input name="hinhanh" type="text" id="hinhanh" maxlength="50" style="width:400px;" 	value="<?php echo $rowTT['hinh_anh']; ?>">
  					<input type="button" name="Button" value="Upload" 
					onClick="window.open('tintuc/Upload.php','','width=500,height=150, status=false')">
                </td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp;Nội Dung</td>
                <td>
                  <textarea name="noidungtintuc" cols="70" rows="10" id="tintuc"><?php echo $rowTT['noi_dung']; ?></textarea>
				  <script language="javascript1.2">
  						generate_wysiwyg('tintuc');
				  </script>
                </td>
              </tr>
              <tr>
                <td colspan="2" align="center">
					<input name="trangchuyen" type="hidden" value="xltintuc" />
					<input name="goihamxuly" type="hidden" value="suatintuc" />
					<input name="matt" type="hidden" value="<?php echo $rowTT['ma_tt']; ?>" />

                  <input type="reset" name="Submit2" value="Làm Lại" />
                  <input type="submit" name="Submit" value="Cập Nhật">
                </label></td>
              </tr>
            </table>
          </form>		
	    </td>
	</tr>
</table>	