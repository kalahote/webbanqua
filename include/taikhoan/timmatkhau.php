
<div style="width:587px; margin-left:3px; margin-right:3px;">

  <table width="587" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="height:25px; background:url(images/trang.jpg) repeat-x;" align="center" class="ht" colspan="3">
				Tìm Mật Khẩu
			</td>
		</tr>
		<tr>
		  <td>
			<?php include('xl_taikhoan.php');?>
			<br />
			<center>Nhập chính xác Tên đăng nhập và email đăng ký có thể tìm lại được mật khẩu</center>
			<form name="quenmatkhau" method="post" action="">
			 <table width="587" border="0" align="center" class="dongbang" style="border-top:#CCCCCC 1px solid;border-right:#CCCCCC 1px solid; 					margin-top:10px; margin-bottom:10px;">
                  <tr>
                    <td width="200">&nbsp;&nbsp;Tên Đăng Nhập </td>
                    <td width="387">
                      <input name="tendangnhap" type="text" id="tendangnhap"style="width:200px;"/>
                   </td>
                  </tr>
                  <tr>
                    <td>&nbsp;&nbsp;Email Đã Đăng Ký </td>
                    <td>
                      <input name="email" type="text" id="email" style="width:200px;"/>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">
						<input type="hidden" name="goiham" value="timmatkhau">
						<input name="view" type="hidden" value="xltaikquan" />
                      <input type="button" name="Button" value="Hiện Mật Khẩu" style="background:#FFFFFF;" onClick="timmatkhau_submit()" />
                    </td>
                  </tr>
                </table>	
				
            </form>			
			</td>
		</tr>
  </table>
</div>
<script>
	function timmatkhau_submit()
	{
		quenmatkhau.submit();
	}
	
</script>