
<table width="220" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="height:25px; background:url(images/trang.jpg) repeat-x;font-weight:bold" align="left" class="ht" colspan="3">
				&nbsp;&nbsp;<img src="images/no.gif" border="0" width="16" height="16" align="bottom"/>
				&nbsp;&nbsp;Tìm Kiếm Nhanh
			</td>
		</tr>
		<tr>
			<td>
			<form action="" method="post" name="timkiem">
				<input name="view" type="hidden" value="manhinhtimkiem" />
				<table width="220" height="85" cellpadding="0" cellspacing="0" border="0" style="border:#CCCCCC 1px solid; margin-top:3px;">
					<tr>
						<td height="5">
						</td>
					</tr>
					<tr>
						<td height="30" align="center" style="text-align:center;padding:5px;">
							
									<input type="text" name="txttim" value="" style="width:200px;background-color:white;padding:5px;color:black" placeholder="Tìm kiếm...">
						</td>
					</tr>	
					<tr>
						<td height="30" align="center" style="text-align:center">
						
									<input type="button" name="Button" value="Search" style="color:black;width:70px;padding:5px" onclick="timkiem_onsubmit()">
						</td>
					</tr>
					<tr>
						<td height="35" align="center" style="text-align:center">
							<a href="#" onclick="dentrang_onsubmit('timnangcao')">Tìm Kiếm Nâng Cao</a>
						</td>
					</tr>
				</table>
			</form>

			</td>
		</tr>
	</table>
	<script>
		function timkiem_onsubmit()
		{
		timkiem.submit()
		}
	</script>
