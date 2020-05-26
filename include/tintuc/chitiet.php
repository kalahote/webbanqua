<?php 
	if(isset($_POST['matintuc']))
	{
		$matin=$_POST['matintuc'];
		$strSQL="SELECT * FROM tin_tuc WHERE ma_tt={$matin}";
		$tintucchitiet=mysqli_query($link,$strSQL);
		$rowTINCHITIET=mysqli_fetch_array($tintucchitiet);
	}
?>
<div style="width:719px; margin-left:3px; margin-right:3px;">

  <table width="719" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="height:25px; background:url(images/trang.jpg) repeat-x;" align="center" class="ht" colspan="3">
				<?php echo $rowTINCHITIET['tieu_de']; ?>
			</td>
		</tr>
		<tr>
			<td>
				
				<table width="719" cellpadding="0" cellspacing="0" border="0" style="border:#CCCCCC 1px solid; margin-top:3px;">
					<tr>
					<td>
						<div style="margin:10px;">
							<?php echo $rowTINCHITIET['noi_dung']; ?>
						</div>
					</td>
			</tr>
			</table>
			
			</td>
		</tr>
  </table>
</div>
