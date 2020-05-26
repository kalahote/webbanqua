<style type="text/css">
	.product{
		float: left;
		width: 210px;
		margin-top:20px;
		text-align: center;
		margin-left: 25px;
		margin-bottom: 30px;
	}
	.spm{
		background:url(images/mtp.png);
		height: 25px;
		color: white;
		margin-bottom: 20px;
	}
	.spm h3{
		padding: 3px;
		padding-left: 15px;
	}
/*	.item{
		background-color: #e1e1e1;
	}*/
	.chung{
		background-color: #f9d5ae;
		height: auto;
	}
	a:visited{
		color: blue;
	}
	a:hover{
		color: red;
	}

</style>
<div class="manu">
<div class="spm hehe">
	<h3>Tin tức mới</h3>
</div>
<div style="width:587px; margin-left:3px; margin-right:3px;">

  <table width="560" border="0" cellpadding="0" cellspacing="0" style="margin-bottom:8px;">
		<tr>
			<td>
				
				<?php 
					//hien thi 1 tin tuc moi nhat
					$strSQL="SELECT * FROM tin_tuc ORDER BY ma_tt desc";
					$tintucmoinhat=mysqli_query($link,$strSQL);
					$rowTINMOI=mysqli_fetch_array($tintucmoinhat);
				?>
					<table width="700" cellpadding="0" cellspacing="0" border="0" style="border:#CCCCCC 1px solid; margin-top:3px;margin-bottom:5px;margin-left:20px;">
					<tr>
					<td>
					<a href="#" onclick="chitiet_tt('<?php echo $rowTINMOI['ma_tt']; ?>')">
						<img src="images/tintuc/<?php echo $rowTINMOI['hinh_anh'] ?>" width="150" height="90" 
						style="border:#999999 1px solid; margin:10px;" align="left" />
					</a>
					<p class="pp">	

					<a href="#" onclick="chitiet_tt('<?php echo $rowTINMOI['ma_tt']; ?>')"><b><?php echo $rowTINMOI['tieu_de'] ?></b></a>
					<br />
					<?php if(strlen($rowTINMOI['noi_dung']) > 120) { ?>
					<?php echo substr($rowTINMOI['noi_dung'], 0, 110)?>...
					<?php } else { ?><?php echo $rowTINMOI['noi_dung']; } ?>
					<br />
					<a href="#" onclick="chitiet_tt('<?php echo $rowTINMOI['ma_tt']; ?>')">
					<img src="images/next.jpg" border="0" align="bottom" />&nbsp;&nbsp;Xem Chi Tiết...</a>&nbsp;&nbsp;&nbsp;
					</p>
					<form name="chitiettin" method="post" action="">
					<input type="hidden" name="matintuc" value="" />
					<input name="view" type="hidden" value="chitiettintuc" />
					</form>
<script>
	function chitiet_tt(matt)
	{
		chitiettin.matintuc.value=matt
		chitiettin.submit()
	}
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
					</td>
			</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td align="right">
				<a href="#" onclick="dentrang_onsubmit('tintuc')"><img src="images/next.jpg" border="0" align="bottom" />
				&nbsp;&nbsp;Xem Thêm Các Tin Khác...</a>
			</td>
		</tr>
  </table>
</div>
<div class="chung clearfix">
<div class="spm">
	<h3>Sản phẩm mới</h3>
</div>
				<?php
					$strSQL="SELECT * FROM qua ORDER BY ma_qua desc";
					$qua=mysqli_query($link,$strSQL);
					while ($row=mysqli_fetch_array($qua)) {
				?>

<div class="item clearfix">				
<div class="product">
	        <div class="image">
				<a href="#" onclick="chitiet('<?php echo $row['ma_qua']; ?>')">
				    <img src="images/sp/<?php echo $row['hinh_anh']; ?>" border="0" height="103" width="120" />
				</a>
			</div>
			<div class="item">
				<div class="name_pd">Tên sản phẩm : <span class="ten"><a href="#" onclick="chitiet('<?php echo $row['ma_qua']; ?>')"><b><?php echo $row['ten_qua']; ?></b></a>												<?php
												// hien trang thai cua qua
													if($row['trang_thai']==1)
													echo "<img src='images/hot.gif' border='0'>";
												?></span>

				</div>		
				<div class="name_pd">Giá bán:<span class="ten"><a href="#" onclick="chitiet('<?php echo $row['ma_qua']; ?>')"><b><?php echo number_format($row['gia'],0,'.','.'); ?> VNĐ</b></a></span>

				</div>
				<div class="detail">
					<a href="#" onclick="chitiet('<?php echo $row['ma_qua']; ?>')">Chi Tiết </a>
					<img src="images/icon.png" border="0" width="14" height="14" align="bottom" />
					<a href="#" onclick="chonhang('<?php echo $row['ma_qua']; ?>','<?php echo $row['ten_qua']; ?>','<?php echo $row['gia']; ?>')">Đặt Mua</a>
				</div>									
										
	        </div>
</div>
<?php } ?>
</div>
</div>
			<div style="margin-bottom:20px;"><a href="#" onclick="dentrang_onsubmit('sanpham')"><img src="images/next.jpg" border="0" align="bottom" />
			&nbsp;&nbsp;
			Xem Thêm Các Sản Phẩm Khác...</a></div>
</div>