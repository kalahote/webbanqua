<?php 
if(isset($_POST['hanhdong']) && $_POST['hanhdong']=="tquat"){
	$_SESSION['hovaten']="";
$tendangnhap=(isset($tendangnhap)?$_POST["txttendangnhap"]:'');
	//$tendangnhap=$_POST["txttendangnhap"];
       // $pass=$_POST["txtpass"];
		$pass=(isset($pass)?$_POST["txtpass"]:'');
		 $strSQL="SELECT *  FROM khach_hang WHERE ten_dn = '$tendangnhap' AND mat_khau = '$pass'";
			$khachhang=mysqli_query($link,$strSQL);
			$rowDN=mysqli_fetch_array($khachhang);
}
?>
<table width="220" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="height:25px; background:url(images/trang.jpg) repeat-x;font-weight:bold" align="left" class="ht" colspan="3">
			&nbsp;&nbsp;<img src="images/no.gif" border="0" width="16" height="16" align="bottom"/>
			&nbsp;&nbsp;Đăng Nhập			</td>
		</tr>
		<tr>
			<td>
			<form action="" method="post" name="formdangnhap">
				<input type="hidden" name="hanhdong" value="" />
			    <table width="220" height="105" cellpadding="0" cellspacing="0" border="0" style="border:#CCCCCC 1px solid; margin-top:3px;">
                  <tr>
                    <td height="5" colspan="2"></td>
                  </tr>
                  <?php if(!isset($_SESSION['hovaten']) || ($_SESSION['hovaten']=="")) { ?>
                  <tr>
                    <td width="90" align="center"  height="25"><span class="demuc">Tên ĐN</span> </td>
                    <td width="130"><input name="txttendangnhap" type="text" id="txttendangnhap" style="width:120px;" value="<?php echo (isset($tendangnhap)?$tendangnhap:''); ?>" autocomplete="off"/>                    </td>
                  </tr>
                  <tr>
                    <td align="center"  height="25"><span class="demuc">Mật khẩu</span> </td>
                    <td><input name="txtpass" type="password" id="txtpass" autocomplete="off" style="width:120px;" />                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td  height="25"><input type="submit" name="Submit" style="color:black;padding:5px;margin-top:5px" value="Đăng Nhập" />                    </td>
                  </tr>
                  <tr>
                    <td height="25" colspan="2" align="center"><span style="color:#FF6600;"><?php echo $thongbaoTK ; ?></span> </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center"  height="30" style="text-align:center;"><a href="#" onclick="dangky_onsubmit('dangky')">Đăng ký</a> &nbsp;&nbsp; <a href="#" onclick="dangky_onsubmit('timmatkhau')">Quên mật khẩu</a> </td>
                  </tr>
                  <?php } else { ?>
                  <tr>
                    <td height="105" align="center"> Chào: <?php echo $_SESSION['hovaten'] ;?> <br />
                      ------------------ <br />
					  
                      <a href="#" onclick="dangky_onsubmit('thongtintaikhoan')">Thông Tin Tài Khoản</a> <br />
                      <a href="#" onclick="tquattaikhoan('tquat')">Thoát Tài Khoản</a> </td>
                  </tr>
                  <?php } ?>
                </table>
			</form>			
			</td>
		</tr>
	</table>
	<form action="" method="post" name="dangky">
		<input type="hidden" name="view" value="" />
		<input type="hidden" name="makhachhang" value="<?php echo $_SESSION['makhachhang']; ?>" />
	</form>
	<script>
		function tquattaikhoan(Lenh)
		{
			formdangnhap.hanhdong.value=Lenh;
			if(confirm('bạn chắc chắn muốn thoát tài khoản..!!'))
			formdangnhap.submit()
		}
		function dangky_onsubmit(trang)
		{	
			dangky.view.value=trang;
			dangky.submit()
		}
	</script>
