<?php 
	$strSQL="SELECT * FROM qua WHERE trang_thai=1 ORDER BY ma_qua desc";
	$quadacbiet=mysqli_query($link,$strSQL);
?>
<form name="hung2" method="post" action="">
	<input type="hidden" name="masanpham" value="" />
	<input type="hidden" name="view" value="" />
</form>
<script>
	function chitiet(masp)
	{
		hung2.masanpham.value=masp
		hung2.view.value="chitiet"
		hung2.submit()
	}
</script>
<table width="220" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="height:25px; background:url(images/trang.jpg) repeat-x;font-weight:bold" align="left" class="ht" colspan="3">
			&nbsp;&nbsp;<img src="images/no.gif" border="0" width="16" height="16" align="bottom"/>
				&nbsp;&nbsp;Quả Đặc Biệt</td>
		</tr>
		<tr>
			<td>
				
				<table width="220" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td>
						<?php $i=0;
						while($rowHDB=mysqli_fetch_array($quadacbiet)) 
						{ 
								$i+=1; 
								//xu ly mau cho dong
									if($i%2==0) 
										$mausac="style='background:#F2F1EF;'";
									else 
			 							$mausac="style='background:#FFFFFF;'";
										?>
							<div style="border:1px #CCCCCC solid; margin-top:4px; width:220px; height:62px;">
								<table width="220" height="52" cellpadding="0" cellspacing="0" border="0" style="margin-top:4px; margin-bottom:4px;">
									<tr>
										<td width="150" <?php echo $mausac ?>>
										&nbsp;&nbsp;
										<a href="#" onclick="chitiet('<?php echo $rowHDB['ma_qua']; ?>')"><b><?php echo $rowHDB['ten_qua']; ?></b>
										</a>
										<br />
										&nbsp;&nbsp;<span class="demuc">Giá Bán:</span><?php echo number_format($rowHDB['gia'],0,'.','.'); ?> đ
										</td>
										<td width="70" align="center">
										<a href="#" onclick="chitiet('<?php echo $rowHDB['ma_qua']; ?>')">
										<img src="images/sp/<?php echo $rowHDB['hinh_anh']; ?>" style="border:1px #E9E9E9 solid;" 
										width="60" height="52"/>
										</a>
										</td>
									</tr>
								</table>
							</div>
						
								
						<?php 
							if($i==8)  break;
						} ?>
						</td>		
					</tr>
				</table>

			</td>
		</tr>
		<tr>
			<td align="right">
				<a href="#" onclick="dacbiet_onsubmit()"> Xem Thêm...</a>&nbsp;&nbsp;
			</td>
		</tr>
</table>
<form action="" method="post" name="dacbiet">
	<input name="trangthai" type="hidden" value="1" />
	<input name="view" type="hidden" value="sanpham" />
</form>
<script>
		function dacbiet_onsubmit()
		{
		dacbiet.submit()
		}
</script>