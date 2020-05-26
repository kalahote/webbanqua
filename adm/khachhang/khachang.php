<?php
	$dieukien="";
	if(isset($_POST['txttukhoa']))
	{
		$tukhoa=$_POST['txttukhoa'];
		$dieukien="ten_dn Like '%{$tukhoa}%'";
	}
	if($dieukien!="")
		$dieukien="WHERE ".$dieukien;
	//phan trang
$strSQL="SELECT count(*) FROM khach_hang {$dieukien}";
	$qua=mysqli_query($link,$strSQL);
	$row=mysqli_fetch_array($qua);
	$sodong=$row[0];
	
	$kichthuoctrang=10;
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
	
	$strSQL="SELECT * FROM khach_hang {$dieukien} ORDER BY ma_kh desc Limit {$dongbatdau},{$kichthuoctrang}";
	$khach_hang=mysqli_query($link,$strSQL);
?>
<form name="timkhach" action="" method="post">
<table width="421" cellpadding="2" cellspacing="0" border="0" align="right" bgcolor="#66A111" style="color:#FFFFCC"> 
<tr><td align="center">
Nhập Tên Đăng Nhập:&nbsp;&nbsp;
</td><td>
<input type="text" name="txttukhoa" id="txttukhoa" style="width:200px;" value="" />
</td><td>
<input name="trangchuyen" type="hidden" value="quanlykhachhang" />
<input type="submit" value="Tìm" name="submit" />
</td></tr></table>
</form>
<table width="750" cellpadding="2" cellspacing="0" border="0" class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="right">
	<tr>
		<th width="40" align="center" style="border-left:#66A111 solid 1px;">
			STT
		</th>
		<th width="290">
			Tên Khách Hàng
		</th>
		<th width="220">
			Tên Đăng Nhập
		</th>
		<th width="200" colspan="2" style="background:#FFFFFF;" align="center">
			
		</th>
	</tr>
	<?php $i=$dongbatdau; ?>
		<?php while($row=mysqli_fetch_array($khach_hang)) { $i+=1; ?>
	<tr>
	<?php 
		//xu ly mau cho dong
			if($i%2==0) 
				$mausac="style='background:#F8F8F8;'";
			 else 
			 	$mausac="style='background:#FFFFFF;'";
	?> 
		<td <?php echo $mausac; ?> >
			<?php echo $i; ?>
		</td>
		<td <?php echo $mausac; ?> >
			<a href="#" onclick="chi_tiet_kh('<?php echo $row['ma_kh']; ?>')"><?php echo $row['ho_kh']." ".$row['ten_kh']; ?></a>
		</td>
		<td <?php echo $mausac; ?> align="center"><?php echo $row['ten_dn']; ?>
		</td>
		<td width="100" align="center" <?php echo $mausac; ?>>
			<a href="#" onclick="chi_tiet_kh('<?php echo $row['ma_kh']; ?>')">Xem</a>
		</td>
		<td width="100" align="center" <?php echo $mausac; ?>>
			<a href="#" onclick="xoa_khachhang('<?php echo $row['ma_kh']; ?>')">Xóa</a>
		</td>
	</tr>
		<?php } ?>
		<tr>
		<td colspan="6" height="30" align="center">
			<?php if((int)$tongsotrang>1) { ?>
				<?php 
					//xu ly review trang
					if((int)$tranghienhanh!=1)
					{
				?>
					<a href="#" class="page" onclick="sotrang(<?php echo $tranghienhanh-1 ?>) "> <img src="../images/review.jpg" border="0" /></a> 
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
				<a href="#" class="page" onclick="sotrang(<?php echo $tranghienhanh+1 ?>) "> <img src="../images/next.jpg" border="0" /></a>		
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
<form name="khachhang" method="post" action="">
	<input name="makhachhang" type="hidden" value="" />
	<input name="trangchuyen" type="hidden" value="xlkhachhang" />
	<input name="goihamxuly" type="hidden" value="xoakhachhang" />
</form>
<form name="chitiet" action="" method="post">
	<input type="hidden" name="makhachhang" value="" />
	<input name="trangchuyen" type="hidden" value="chitietkh" />
</form>
<script>
	function xoa_khachhang(makhachhang)
	{
		khachhang.makhachhang.value=makhachhang
		if(confirm("bạn có thực sự muốn xóa khách hàng này không"))
		khachhang.submit()
	}
	function chi_tiet_kh(makhachhang)
	{
		chitiet.makhachhang.value=makhachhang
		chitiet.submit()
	}
</script>
<form name="hung1" method="post" action="">
	<input type="hidden" name="tranghienhanh" value="" />
	<input type="hidden" name="trangchuyen" value="quanlykhachhang" />
</form>
<script>
	function sotrang(trang,masp)
	{
		hung1.tranghienhanh.value=trang
		hung1.submit()
	}
</script>