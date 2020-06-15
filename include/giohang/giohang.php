<?php
	$strSQL="SELECT * FROM qua ";
	$gia=mysqli_query($link,$strSQL);
	$row=mysqli_fetch_array($gia);
?>
<?php
	//kiem tra dang nhap
	if(!isset($_SESSION['hovaten']) || ($_SESSION['hovaten']==""))
	{
?>	
		<div style="width:587px; margin-left:3px; margin-right:3px;">
		<table width="719" cellpadding="0" cellspacing="0" border="0" style="border:#999999 1px solid; margin-top:3px;">
		<tr>
		<td>

		<p class="pp"><center><span style="color:#FF9900;">Bạn Phải Là Thành Viên Mới Được Sử Dụng Chức Năng Mua Hàng</span>
		<br>
		<a href="#" onclick="dangky_onsubmit('dangky')">Bấm Vào Đây Để Đăng Ký Tài Khoản</a></center>
		</p>

		</td>
		</tr>
		</table>
		</div>
<?php
	}
	else
	{
	//---------------------------------------
	include_once('xl_giohang.php');
		
	$arrmasp=$_SESSION['arrmasp'];
	$arrtensp=$_SESSION['arrtensp'];
	$arrsoluong=$_SESSION['arrsoluong'];
	$arrdongia=$_SESSION['arrdongia'];
	$n=$_SESSION['n'];
?>

<div style="width:587px; margin-left:3px; margin-right:3px;">
<table width="719" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="height:25px; background:url(images/trang.jpg) repeat-x;" align="center" class="ht" colspan="3">
				Giỏ Hàng Của <?php echo $_SESSION['hovaten']; ?>
			</td>
		</tr>
		<tr>
			<td>
	<form name="giohangcuaban" action="" method="post">	
		<input type="hidden" name="view" value="dathang" />	
		<input type="hidden" name="hanhdong" value="capnhatgiohang" />		
			 <table width="719" border="0" cellpadding="0" cellspacing="0" class="dongbang" style="border:#CCCCCC 1px solid;border-bottom:none;border-left:none; margin-top:3px;">
			 		
           <tr>
                    <td width="35" align="center" height="30">STT</td>
                    <td width="200" align="center">Tên Hàng</td>
                    <td width="70" align="center">Số Lượng</td>
                    <td width="100" align="center">Đơn Giá</td>
                    <td width="110" align="center">Thành Tiền</td>
                    <td width="70" align="center">&nbsp;</td>
               </tr>
				  <?php 
				  $tongtien=0;
				  for($i=0; $i<$n; $i++){ 
					  echo "<tr>";
					foreach($gia as $g)
					{
						if($arrmasp[$i] ==$g['ma_qua'])
						{
							$a =$i+1;
							echo "<td>".$a."</td>";
							echo "<td>".$g['ten_qua']."</td>";
							echo "<td><input name='txtsl".$i."' type='text' style='width:30px' value='".$arrsoluong[$i]."'maxlength='2' /></td>";
							echo "<td>".$g['gia']."</td>";
							echo "<td align='center'>" .$g['gia']*$arrsoluong[$i]."</td>";
							?>
						<!-- <td align="center" style="height:27px;">
							<input name="txtsl<?php echo $i; ?>" type="text" style="width:30px" value="<?php echo $arrsoluong[$i]; ?>" maxlength="2" />
						</td> -->
						<td align="center"><a href="#" onclick="xl_giohang('xoasanpham','<?php echo $arrmasp[$i]; ?>')">Xóa</a></td>
						<?php
						$tongtien+=($g['gia']*$arrsoluong[$i]);
						}
					}
					echo "</tr>";
				}
					?>	
                  <tr>
                    <td colspan="6" align="right" style="height:30px;"><span class="demuc">tổng tiá trị giỏ hàng:
					</span><span class="ten"> <?php echo number_format($tongtien,0,'.','.'); ?> VNĐ</span>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="6" align="center">
					<a href="#" onclick="dentrang_onsubmit('sanpham')">Thêm Sản Phẩm Vào Giỏ</a>
					<img src="images/icon.png" border="0" width="14" height="14" align="bottom" />
					<a href="#" onclick="capnhatgiohang('capnhatgiohang')">Cập Nhật Giỏ Hàng</a>
					<img src="images/icon.png" border="0" width="14" height="14" align="bottom" />
					<a href="#" onclick="thanhtoan('thanhtoan')">Thanh Toán</a>
					</td>
                  </tr>
                </table>			
			</form>	
				</td>
		</tr>
	</table>
<p>
	<center><span class="demuc"><b><?php echo $thongtin; ?></b></span></center>
</div>
<p>
<form name="thanhgio" action="" method="post">
	<input type="hidden" name="view" value="dathang" />
	<input type="hidden" name="viewthanhtoan" value="thanhtoan" />
</form>
<?php
	//hien trang thong tin thanh toan
	if(isset($_POST['viewthanhtoan']))
	{
		$manhinh=$_POST['viewthanhtoan'];
			if($manhinh=='thanhtoan')
				include_once('include/giohang/thanhtoan.php');
	}
	
?>
<?php 
//-------------------------------------------
}
?>
<form name="giohang" action="" method="post">
	<input type="hidden" name="hanhdong" value="" />
	<input type="hidden" name="masp" value="" />
	<input type="hidden" name="view" value="dathang" />
</form>
<script>
	function xl_giohang(hanhdong,masp)
	{
		giohang.hanhdong.value=hanhdong
		giohang.masp.value=masp
		giohang.submit()
	}
	function capnhatgiohang()
	{
		giohangcuaban.submit()
	}
	function thanhtoan()
	{
		thanhgio.submit()
	}
</script>