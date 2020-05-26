
<table width="587" cellpadding="0" cellspacing="0" border="0" style="border:#CCCCCC 1px solid; margin-top:3px;">
					<tr>
						<td>
						  <form id="formcapnhat" name="formcapnhat" method="post" action="">
						  
						  <table width="450" border="0" cellpadding="3" cellspacing="0" align="center" class="dongbang" style="border-top:#CCCCCC 1px solid;border-right:#CCCCCC 1px solid; margin-top:10px; margin-bottom:10px;">
                            <tr>
                              <td width="150">&nbsp;&nbsp;Tên Đăng Nhập </td>
                              <td width="300">
                                <?php echo $row['ten_dn']; ?>
                              </td>
                            </tr>
                            <tr>
                              <td>&nbsp;&nbsp;Mật Khẩu </td>
                              <td>
                                <input name="matkhau" type="password" id="matkhau" style="width:200px;" value="<?php echo $row['mat_khau']; ?>"/>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2" align="center">&nbsp;&nbsp;Họ&nbsp;
                                
                                <input name="ho" type="text" id="ho" style="width:150px;" value="<?php echo $row['ho_kh']; ?>"/>
                               
                              &nbsp;&nbsp;Tên &nbsp;
                             
                              <input name="ten" type="text" id="ten" style="width:150px;" value="<?php echo $row['ten_kh']; ?>"/>
                             </td>
                            </tr>
                            <tr>
                              <td>&nbsp;&nbsp;Số Điện Thoại </td>
                              <td>
                                <input name="sdt" type="text" id="sdt" style="width:200px;" maxlength="12" value="<?php echo $row['sdt']; ?>"/>
                              </td>
                            </tr>
                            <tr>
                              <td>&nbsp;&nbsp;Email</td>
                              <td>
                                <input name="email" type="text" id="email" style="width:200px;" value="<?php echo $row['email']; ?>"/>
                              </td>
                            </tr>
                            <tr>
                              <td>&nbsp;&nbsp;Địa Chỉ Nhà </td>
                              <td>
                                <textarea name="diachi" cols="40" rows="3" id="diachi"  style="border-right:none;"><?php echo $row['dia_chi']; ?></textarea>
                              </td>
                            </tr>
                            <tr>
                              <td>&nbsp;&nbsp;Giới Tính </td>
                              <td>
                                <select name="gioitinh" >
									<option value="1">Không Xác Định</option>
									<option value="2" selected="selected">Nam</option>
									<option value="3">Nữ</option>
                                </select>
                             </td>
                            </tr>
                            <tr>
                              <td colspan="2">
							  <input name="goiham" type="hidden" value="capnhattaikhoan" />
							  <input name="view" type="hidden" value="xltaikhoan" />
							  <input type="hidden" name="makhachhang" value="<?php echo $row['ma_kh']; ?>" />
                              <input type="submit" name="Submit" value="Cập Nhật Thông Tin" style="background:#FFFFFF;"/>
                            	</td>
                            </tr>
                          </table>		
                          </form>		
					</td>
			</tr>
			</table>