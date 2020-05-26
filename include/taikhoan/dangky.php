<?php session_destroy(); ?>
<script language="JavaScript" type="text/javascript">

	function kiemtra_dangky()
	{
		var tendangnhap=formdangky.tendangnhap.value;
		var matkhau=formdangky.matkhau.value;
		var ho=formdangky.ho.value;
		var ten=formdangky.ten.value;
		var sdtquai=formdangky.sdt.value;
		var email=formdangky.email.value;
		var diachi=formdangky.diachi.value;
		
		if(tendangnhap=="")
		{
			document.all('loitendangnhap').innerHTML="bạn chưa nhập vào tên đăng nhập!"
			formdangky.tendangnhap.style.backgroundColor='#FFFFCC'
			formdangky.tendangnhap.focus()
			return false
		}
		else
		{
			document.all('loitendangnhap').innerHTML=""
			formdangky.tendangnhap.style.backgroundColor="#FFFFFF"
			
		}
		
		if(matkhau=="")
		{
			document.all('loimatkhau').innerHTML="bạn chưa nhập vào mật khẩu!"
			formdangky.matkhau.style.backgroundColor='#FFFFCC'
			formdangky.matkhau.focus()
			return false
		}
		else
		{
			document.all('loimatkhau').innerHTML=""
			formdangky.matkhau.style.backgroundColor="#FFFFFF"
			
		}
		
		if(ho=="")
		{
			document.all('loihoten').innerHTML="bạn chưa nhập vào họ!"
			formdangky.ho.style.backgroundColor='#FFFFCC'
			formdangky.ho.focus()
			return false
		}
		else
		{
			document.all('loihoten').innerHTML=""
			formdangky.ho.style.backgroundColor="#FFFFFF"
			
		}
		
		if(ten=="")
		{
			document.all('loihoten').innerHTML="bạn chưa nhập vào tên!"
			formdangky.ten.style.backgroundColor='#FFFFCC'
			formdangky.ten.focus()
			return false
		}
		else
		{
			document.all('loihoten').innerHTML=""
			formdangky.ten.style.backgroundColor="#FFFFFF"
			
		}
		
		kieu=/^[0-9]{10,11}$/
		lt=kieu.test(sdtquai)
		if(sdtquai=="")
		{
			document.all('loidientquai').innerHTML="bạn chưa nhập vào số điện thoại!"
			formdangky.sdt.style.backgroundColor='#FFFFCC'
			formdangky.sdt.focus()
			return false
		}
		else
		{	
			if(lt==false)
			{
				document.all('loidientquai').innerHTML="bạn phải nhập bằng số có từ 10 đến 11 ký tự!"
				formdangky.sdt.style.backgroundColor='#FFFFCC'
				formdangky.sdt.focus()
				return false
			}
			else
			{
			document.all('loidientquai').innerHTML=""
			formdangky.sdt.style.backgroundColor="#FFFFFF"
			}
			
		}
		
		dangmail= /^[\w.-]+@[\w.-]+\.[A-Za-z]{2,4}$/
		kq=dangmail.test(email)
		if(email=="")
		{
			document.all('loimail').innerHTML="bạn chưa nhập email!"
			formdangky.email.style.backgroundColor="#FFFFCC"
			formdangky.email.focus()
			return false
		}
		else
		{	
			if(kq==true)
			{
			document.all('loimail').innerHTML=""
			formdangky.email.style.backgroundColor="#FFFFFF"
			}
			else
			{
			document.all('loimail').innerHTML="bạn nhập sai dạng email - dạng email vd: tenban@yahoo.com"
			formdangky.email.style.backgroundColor="#FFFFCC"
			formdangky.email.focus()
			return false
			}
			
		}
		
		if(diachi=="")
		{
			document.all('loidiachi').innerHTML="bạn chưa nhập vào địa chỉ!"
			formdangky.diachi.style.backgroundColor="#FFFFCC"
			formdangky.diachi.focus()
			return false
		}
		else
		{	

			document.all('loidiachi').innerHTML=""
			formdangky.diachi.style.backgroundColor="#FFFFFF"
		}
		
		return true
	}

</script>
<div style="width:587px; margin-left:3px; margin-right:3px;">

  <table width="587" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="height:25px; background:url(images/trang.jpg) repeat-x;" align="center" class="ht" colspan="3">
				Đăng Ký Khách Hàng
				
			</td>
		</tr>
		<tr>
			<td>
<?php include_once('xl_taikhoan.php'); ?>
				<table width="587" cellpadding="0" cellspacing="0" border="0" style="border:#CCCCCC 1px solid; margin-top:3px;">
					<tr>
						<td>
						  <form id="formdangky" name="formdangky" method="post" action="" onsubmit="return kiemtra_dangky()">
						  
						  <table width="450" border="0" align="center" cellpadding="3" cellspacing="0" class="dongbang" style="border-top:#CCCCCC 1px solid;border-right:#CCCCCC 1px solid; margin-top:10px; margin-bottom:10px;">
                            <tr>
                              <td width="150">&nbsp;&nbsp;Tên Đăng Nhập </td>
                              <td width="300">
                                <input name="tendangnhap" type="text" id="tendangnhap" style="width:200px;" maxlength="15" 
								value=""/>
								<br /><span id="loitendangnhap" style="color:#FF6600;"></span>
                              </td>
                            </tr>
                            <tr>
                              <td>&nbsp;&nbsp;Mật Khẩu </td>
                              <td>
                                <input name="matkhau" type="password" id="matkhau" style="width:200px;" maxlength="15"/>
								<br /><span id="loimatkhau" style="color:#FF6600;"></span>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2" align="center">&nbsp;&nbsp;Họ&nbsp;
                                
                                <input name="ho" type="text" id="ho" style="width:150px;"
								value=""/>
                               
                              &nbsp;&nbsp;Tên &nbsp;
                             
                              <input name="ten" type="text" id="ten" style="width:150px;"
							  value=""/>
							  <br /><span id="loihoten" style="color:#FF6600;"></span>
                             </td>
                            </tr>
                            <tr>
                              <td>&nbsp;&nbsp;Số Điện Thoại </td>
                              <td>
                                <input name="sdt" type="text" id="sdt" style="width:200px;" maxlength="12"
								value=""/>
								<br /><span id="loidientquai" style="color:#FF6600;"></span>
                              </td>
                            </tr>
                            <tr>
                              <td>&nbsp;&nbsp;Email</td>
                              <td>
                                <input name="email" type="text" id="email" style="width:200px;" maxlength="50"
								value=""/>
								<br /><span id="loimail" style="color:#FF6600;"></span>
                              </td>
                            </tr>
                            <tr>
                              <td>&nbsp;&nbsp;Địa Chỉ Nhà </td>
                              <td>
                    <textarea name="diachi" cols="31" rows="3" id="diachi" style="border-right:none;"> </textarea>
								<br /><span id="loidiachi" style="color:#FF6600;"></span>
                              </td>
                            </tr>
                            <tr>
                              <td>&nbsp;&nbsp;Giới Tính </td>
                              <td>
                                <select name="gioitinh">
									<option value="0" selected="selected">----Chọn giói tính----</option>
									<option value="1">Không Xác Định</option>
									<option value="2">Nam</option>
									<option value="3">Nữ</option>
                                </select>
                             </td>
                            </tr>
                            <tr>
                              <td align="center">
							  <img src="include/taikhoan/captcha.php" alt="captcha" /></td>
                              <td align="center"> 
							  Nhập Lại Mã Xác Nhận Bên Cạnh:&nbsp;&nbsp;<input type="text" name="code" value="" style="width:70px;" />
							  </td>
                            </tr>
                            <tr>
                              <td colspan="2" align="center">
							  <input name="goiham" type="hidden" value="dangkytaikhoan" />
							  <input name="view" type="hidden" value="xltaikhoan" />
							  
							  <input type="button" name="" value="Làm Trắng Form" onclick="dangky_onsubmit('dangky')" style="background:#FFFFFF;" />
                              <input type="submit" name="Submit" value="Đăng Ký" style="background:#FFFFFF;" onclick="kiemtra_dangky()"/>
                           	  </td>
                            </tr>
                          </table>		
                          </form>		
					</td>
			</tr>
			</table>
				
			</td>
		</tr>
  </table>
</div>
