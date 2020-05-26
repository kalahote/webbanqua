<?php
	include_once('timnangcao.php');
?>
<?php
	$dieukien="";
	
	//tim kiem nang cao
	//kiem tra xem ten qua co duoc nhap vao hay khong
	if(isset($_POST['txttim']))
		{
			$tukhoa=$_POST['txttim'];
			if($tukhoa!="")
			$dieukien="ten_qua Like '%{$tukhoa}%'";
		}	
	//kiem tra xem mo ta co duoc nhap vao hay khong
	
	if(isset($_POST['txtmota']))
		{
			$mota=$_POST['txtmota'];
			if($mota!="")
				{
					if($dieukien!="")
						$dieukien=$dieukien."AND mo_ta Like '%{$mota}%'";
					else
						$dieukien="mo_ta Like '%{$mota}%'";
				}
			
		}
	//kiem tra ma loai qua co duco nhap vao hay khong
		if(isset($_POST['loaiqua']))
		{
			$maloaiqua=$_POST['loaiqua'];
			if($maloaiqua!="0")
				{
					if($dieukien!="")
						$dieukien=$dieukien."AND ma_loai = {$maloaiqua}";
					else
						$dieukien="ma_loai = {$maloaiqua}";	
				}
			
		}
		if($dieukien!="")
		$dieukien="WHERE ".$dieukien;
		
	$strSQL="SELECT count(*) FROM qua {$dieukien} ;";
	$qua=mysqli_query($link,$strSQL);
	$row=mysqli_fetch_array($qua);
	$sodong=$row[0];
	
	$kichthuoctrang=6;
		if(($sodong%$kichthuoctrang)==0)
				$tongsotrang=$sodong/$kichthuoctrang;
		else
				$tongsotrang=($sodong/$kichthuoctrang)+1;
			
			
	if(!isset($_POST['tranghienhanh']) || $_POST['tranghienhanh']=="1")
		{
			$dongbatdau=0;
			$tranghienhanh=1;
		}
	else
		{
			$dongbatdau=($_POST['tranghienhanh']-1)*$kichthuoctrang;
			$tranghienhanh=$_POST['tranghienhanh'];
		}
	
	$strSQL="SELECT * FROM qua {$dieukien} ORDER BY ma_qua desc Limit {$dongbatdau},{$kichthuoctrang};";
	$qua=mysqli_query($link,$strSQL);
?>

<form name="trangtk" method="post" action="">
	<input type="hidden" name="tranghienhanh" value="" />
	<input type="hidden" name="view" value="timnangcao" />
	<input type="hidden" name="masanpham" value="" />
	
</form>

  <form name="nhanthongtin" method="post" action="">
    <input name="txtmasp" type="hidden" value="" />
	<input name="txttensp" type="hidden" id="txttensp">
	<input name="txtdongia" type="hidden" id="txtdongia" >
	<input type="hidden" name="view" value="dathang" />
	<input type="hidden" name="hanhdong" value="them" />
  </form>
<script>
	function sotrang(trang)
	{
		trangtk.tranghienhanh.value=trang
		trangtk.submit()
	}
		function chonhang(mahang,tenhang,gia)
	{
		nhanthongtin.txtmasp.value=mahang
		nhanthongtin.txttensp.value=tenhang
		nhanthongtin.txtdongia.value=gia
		nhanthongtin.submit()
		
	}
	function chitiet(masp)
	{
		trangtk.masanpham.value=masp
		trangtk.view.value="chitiet"
		trangtk.submit()
	}
</script>

<div style="width:587px; margin-left:3px; margin-right:3px;">
  <table width="587" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="height:25px; background:url(images/trang.jpg) repeat-x;" align="center" class="ht" colspan="3">
				
			</td>
		</tr>
		<tr>
			<td>
				<?php 
							while($row=mysqli_fetch_array($qua))
							{
				?>
				<table width="719" height="120" cellpadding="0" cellspacing="0" border="0" style="border:#CCCCCC 1px solid; margin-top:3px;">
					<tr>
						<td width="150">
							<div style="margin-left:3px; margin-right:3px; margin-top:3px; margin-bottom:3px; border:#CCCCCC solid 1px; width:120px;
							height:103px;">
							<a href="#">
								<img src="images/sp/<?php echo $row['hinh_anh']; ?>" border="0" height="103" width="120" />
							</a>
							</div>
						</td>
						<td width="437">
						
							<table width="437" cellpadding="0" cellspacing="0" border="0">
								<tr> 
									<td height="20" align="center">
										<span class="demuc">
										Tên Sản Phẩm:</span> 								
										<span class="ten"><a href="#"><b><?php echo $row['ten_qua']; ?></b></a></span>
										<br />
										<span class="demuc">Giá Bán:</span><?php echo number_format($row['gia'],0,'.','.'); ?> đ
									</td>
								</tr>
								<tr>
									<td align="left">
										<?php echo $row['mo_ta']; ?>.
								<br />
										<a href="#" onclick="chitiet('<?php echo $row['ma_qua']; ?>')">Chi Tiết </a>
										<img src="images/icon.png" border="0" width="14" height="14" align="bottom" />
		<a href="#" onclick="chonhang('<?php echo $row['ma_qua']; ?>','<?php echo $row['ten_qua']; ?>','<?php echo $row['gia']; ?>')">Đặt Mua</a>
									</td>
										
								</tr>
							</table>
							
					</tr>
				</table>
				<?php }; ?>
			</td>
		</tr>
		<tr>
			<td align="center">
			<table width="587" height="50" cellpadding="0" cellspacing="0" border="0" style="border:#CCCCCC 1px solid; margin-top:3px;">
					<tr>
						<td>
	<?php if((int)$tongsotrang>1) { ?>
				<?php 
					//xu ly review trang
					if((int)$tranghienhanh!=1)
					{
				?>
					<a href="#" class="page" onclick="sotrang(<?php echo $tranghienhanh-1 ?>) "> <img src="images/review.jpg" border="0" /></a> 
					<?php } ?>
			
			<?php for($i=1; $i<=$tongsotrang; $i++ ) { ?>
				<?php if ((int)$tranghienhanh==$i) { ?>
					<a href="#" class="tranghientai" onclick="sotrang(<?php echo $i; ?>)"> <?php echo $i; ?></a>
					<?php } else  {?>	
					<a href="#" class="phantrang" onclick="sotrang(<?php echo $i; ?>)"> <?php echo $i; ?></a>
				<?php } ?>	
			<?php } ?>	
				<?php 
					//xu ly next trang
					if((int)$tranghienhanh!=(int)$tongsotrang)
					{
					?>
				<a href="#" class="page" onclick="sotrang(<?php echo $tranghienhanh+1 ?>) "> <img src="images/next.jpg" border="0" /></a>		
					<?php } ?>
		<?php } ?>		
			
		<?php if((int)$tongsotrang>1) { ?>
		  <select name="select" onchange="sotrang(this.value)" >
	   	   	<?php for($i=1; $i<=$tongsotrang; $i++ ) { ?>
					<?php if ($tranghienhanh==$i) { ?>
						<option value="<?php echo $i; ?>" selected="selected">Trang  <?php echo $i; ?></option>
					<?php } else  {?>
						<option value="<?php echo $i; ?>" >Đến Trang  <?php echo $i; ?></option>
					<?php } ?>			
			<?php } ?>			   
	   	</select> 
		<?php } ?>	
				</td>
			</tr>
			</table>
			
			</td>
		</tr>
  </table>
</div>
