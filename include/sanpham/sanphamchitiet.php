<?php
	if(isset($_POST['masanpham']))
	{
		$masanpham=$_POST['masanpham'];
		$strSQL="SELECT * FROM qua WHERE ma_qua={$masanpham}";
		$qua=mysqli_query($link,$strSQL);
		$row=mysqli_fetch_array($qua);
	}
?>
<script>
	function chonhang(mahang,tenhang,gia)
	{
		nhanthongtin.txtmasp.value=mahang
		nhanthongtin.txttensp.value=tenhang
		nhanthongtin.txtdongia.value=gia
		nhanthongtin.submit()
		
	}
</script>


   <form name="nhanthongtin" method="post" action="">
    <input name="txtmasp" type="hidden" value="" />
	<input name="txttensp" type="hidden" id="txttensp">
	<input name="txtdongia" type="hidden" id="txtdongia" >
	<input type="hidden" name="view" value="dathang" />
	<input type="hidden" name="hanhdong" value="them" />
  </form>
<div style="width:587px; margin-left:3px; margin-right:3px;">

  <table width="587" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="height:25px; background:url(images/trang.jpg) repeat-x;" align="center" class="ht" colspan="3">
				<?php echo $row['ten_qua'] ?>	
			</td>
		</tr>
		<tr>
			<td>
				
				<table width="719" height="120" cellpadding="0" cellspacing="0" border="0" style="border:#CCCCCC 1px solid; margin-top:3px;">
					<tr>
						<td width="150">
							<div style="border:#E9E9E9 solid 1px; width:120px;height:103px; margin-left:auto; margin-right:auto; margin-top:4px; margin-bottom:10px;">
							
								<img src="images/sp/<?php echo $row['hinh_anh']; ?>" border="0" height="103" width="120" />
						
							</div>
						</td>
					</tr>
					<tr>
						<td align="center">
								<p class="pp">
										<span class="demuc">
										Tên Sản Phẩm:</span> 								
										<span class="ten"><b><?php echo $row['ten_qua']; ?></b></span>
										<br />
										<span class="demuc">Ngày Đăng:<?php echo $row['ngay_d']; ?></span> 
										<br />
										<span class="demuc">Giá Bán:</span><?php echo number_format($row['gia'],0,'.','.'); ?> đ
										<br />
										<?php echo $row['mo_ta']; ?>.
										<br />				
										<a href="#" onclick="chonhang('<?php echo $row['ma_qua']; ?>','<?php echo $row['ten_qua']; ?>','<?php echo $row['gia']; ?>')">Đặt Mua</a>
								</p>
						</td>				
					</tr>
				</table>
			</td>
		</tr>
  </table>
</div>
