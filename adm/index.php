<?php session_start(); ?>
<?php include('../include/ketnoi.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php 
//if($_REQUEST['trangchuyen']=="")
	echo "Admin CP";
//else
//	echo $_REQUEST['trangchuyen']; 
//?>
</title>
<link rel="stylesheet" type="text/css" href="admstyle.css">
</head>
<Script language="JavaScript" type="text/javascript" src="../js/openwysiwyg/wysiwyg.js"> </script>
<body>
<?php
	$thongbao="";
	if(isset($_POST['txttendangnhap']) && isset($_POST['txtpass']))
	{	
		$tendangnhap=$_POST['txttendangnhap'];
		$pass=$_POST['txtpass'];
		
		$strSQL="SELECT *  FROM adm WHERE ten_dn = '{$tendangnhap}' AND mat_khau = '{$pass}'";
		$admin=mysqli_query($link,$strSQL);
		
		//Kiem Tra Du Lieu-Neu Co Luu Vao SS-Neu Khong Bao Loi//
		if(mysqli_num_rows($admin)>0)
		{
			//lay ten luu vao SS//
			$row=mysqli_fetch_array($admin);
			$_SESSION['hovatenad']=$row['ho']." ".$row['ten'];
			$_SESSION['phanquyen']=$row['ten_dn'];
		}
		else
			$thongbao="Sai Tên Đăng Nhập Hoặc Mật Khẩu";
	}
if(isset($_POST['tquat']) && $_POST['tquat']=="tquat")
	$_SESSION['hovatenad']="";
?>
<?php if(!isset($_SESSION['hovatenad']) || ($_SESSION['hovatenad']=="")) { ?>

<form action="" method="post" name="formdangnhapadmin">


<table width="400" border="0" class="admintable" cellpadding="2" cellspacing="0" align="center" style="margin-top:200px; border-right:solid 1px #E9E9E9; border-top:solid 1px #E9E9E9; background:url(../images/security.png) no-repeat right;">
  <tr>
    <th colspan="3">Đăng Nhập ADMIN CONTROL PANEL</th>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Tên Đăng Nhập</td>
    <td><input name="txttendangnhap" type="text" id="txttendangnhap" style="width:200px;"/>   </td>
	<td rowspan="2"><img src="../images/security.png" width="64" height="64" border="0" /></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Mật Khẩu</td>
    <td><input name="txtpass" type="password" id="txtpass" style="width:200px;" />   </td>
  </tr>
  <tr>
    <td colspan="3" style="color:#CC3300;" align="center"><?php echo $thongbao ; ?></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" name="Submit" style="background:#FFFFFF; color:#FFCC33;" value="Đăng Nhập" /></td>
  </tr>
</table>
</form>


<?php } else { ?>
     <form action="" method="post" name="hung">
		<input type="hidden" name="tquat" value="" />
	</form>    
	<table border="0" cellpadding="0" cellspacing="0" width="960" align="center" style="margin-top:20px; margin-bottom:20px; background:#FFFFFF;">
		<tr>
			<td height="40" style="color:#FFFFCC; background:#66A111;" colspan="2" align="center">
				ADMIN CONTROL PANEL - SIEU THI QUA ONLINE 
			</td>
		</tr>
		<tr>
			<td height="25" style="color:#FF6600; background:url(../images/trang.jpg) repeat-x;" colspan="2" align="right">
				
		  </td>
			</td>
		</tr>
		<tr>
			<td width="200" valign="top" style="border-right: 1px #66A111 solid; border-left: 1px #66A111 solid;">
			<div class="menuleft">
					<a href="#" onclick="adm_chuyentrang('quanlyloaiqua')">Quản Lý Loại Quả</a>
					<a href="#" onclick="adm_chuyentrang('quanlyqua')">Quản Lý Quả</a>
					<a href="#" onclick="adm_chuyentrang('quanlydondathang')">Quản Lý Đơn Đặt Hàng</a>
					<a href="#" onclick="adm_chuyentrang('quanlykhachhang')">Quản Lý Khách Hàng</a>
					<a href="#" onclick="adm_chuyentrang('quanlyadmin')">Quản Lý Admin</a>
					<a href="#" onclick="adm_chuyentrang('quanlytintuc')">Quản Lý Tin Tức</a>
					<a href="#" onclick="adm_chuyentrang('quanlylienhe')">Quản Lý Liên Hệ</a>
			</div>
			<div style="width:200px; margin-top:10px; margin-bottom:10px; background:#FFFFFF; color:#009933; line-height:30px; 
			border:#66A111 solid 1px; border-right:none; border-left:none;">
			<p class="pp">
			<img src="../images/admin_pinguim.gif" border="0" width="112" height="32"/>
				<br />
				Chào: <?php echo $_SESSION['hovatenad'] ;?>
				<br />
				Quyền Hạn:<font color="#666666"><?php if($_SESSION['phanquyen']=='admin') echo "Admin"; else echo "Quản Trị Viên"; ?></font>
				<br />
				<a href="#" onclick="tquattaikquan('tquat')">Thoát Tài Khoản</a>
			</p>
			</div>
			<?php include('../include/thongke.php'); ?>
			
			<div style="margin-top:4px;padding:10px; background:#66A111; color:#FFFFCC; border:1px #66A111 solid; 
			background:#FFFFFF; color:#999999; text-align:left; border-right:none; border-left:none;">
					<span class="demuc"> Tổng Số Loại Quả:</span> <?php echo $soloaiqua; ?>
					<br />
					<span class="demuc">Tổng Số Quả:</span> <?php echo $soqua; ?>	
					<br />
					<span class="demuc">Số Khách Hàng:</span> <?php echo $khachhang; ?>
					<br />
					<span class="demuc">Số Tin Tức:</span> <?php echo $tintuc; ?> 
					<br />
					<span class="demuc">Số Góp Ý:</span> <?php echo $lienhe; ?>
					<br />
					<span class="demuc">Số Đơn Đặt Hàng:</span> <?php echo $dondathang; ?> 
					<br/>
					<span class="demuc">Doanh thu:</span> <?php echo $doanhthu; ?>
				</div>
			</td>
			<td width="760" valign="top">
					<?php
					if(isset($_POST['trangchuyen']))
					{
						$hienthi=$_POST['trangchuyen'];
						if($hienthi=='quanlyloaiqua')
							include_once('loaiqua/loaiqua.php');
						else if($hienthi=='quanlyqua')
							include_once('qua/qua.php');
						else if($hienthi=='quanlylienhe')
							include_once('lienhe/inlienhe.php');
						else if($hienthi=='quanlytintuc')
							include_once('tintuc/tintuc.php');
						else if($hienthi=='quanlykhachhang')
							include_once('khachhang/khachang.php');
						else if($hienthi=='quanlyadmin')
							include_once('admin/admin.php');
						else if($hienthi=='quanlydondathang')
							include_once('dondathang/dondathang.php');
							
							/////////////////////////////////////////////////////////	
						else if($hienthi=='xlloaiqua')
							include_once('loaiqua/xl_loaiqua.php');
						else if($hienthi=='xlqua')
							include_once('qua/xl_qua.php');
						else if($hienthi=='xllienhe')
							include_once('lienhe/xl_lienhe.php');
						else if($hienthi=='chitietlienhe')
							include_once('lienhe/chitiet.php');
						else if($hienthi=='xlkhachhang')
							include_once('khachhang/xl_khachang.php');
						else if($hienthi=='chitietkh')
							include_once('khachhang/chitietkhachhang.php');
						else if($hienthi=='xltintuc')
							include_once('tintuc/xl_tintuc.php');
						else if($hienthi=='themtintuc')
							include_once('tintuc/themtintuc.php');
						else if($hienthi=='suatintuc')
							include_once('tintuc/suatintuc.php');
						else if($hienthi=='xladmin')
							include_once('admin/xl_admin.php');	
						else if($hienthi=='xl_dondathang')
							include_once('dondathang/xl_dathang.php');	
						else if($hienthi=='chitiet_dh')
							include_once('dondathang/chitietdonhang.php');					
					}
						else
							include_once('loaiqua/loaiqua.php');
					?>
			</td>
		</tr>
		<tr>
			<td colspan="2" height="30" style="color:#FFFFCC; background:#66A111;" align="center" valign="middle">
			Copyright © Nguyễn Quốc Trung. Công Nghệ Phần Mềm. 
			</td>
		</tr>
	</table>

<form action="" method="post" name="chuyentrang">
	<input name="trangchuyen" type="hidden" value="" />
</form>

<script>
	function adm_chuyentrang(trang)
	{
		chuyentrang.trangchuyen.value=trang
		chuyentrang.submit()
	}
	
	function tquattaikquan(Lenh)
	{
			hung.tquat.value=Lenh;
			if(confirm('bạn chắc chắn muốn thoát tài khoản..!!'))
			hung.submit()
	}
</script>
<?php } ?>
 
</body>
</html>