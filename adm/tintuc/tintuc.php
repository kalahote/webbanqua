<?php
//tim kiem
$dieukien="";
	if(isset($_POST['tukhoa']))
	{
		$tukhoa=$_POST['tukhoa'];
		$dieukien="tieu_de Like '%{$tukhoa}%'";
	}
	if($dieukien!="")
		$dieukien="WHERE ".$dieukien;
//phan trang
$strSQL="SELECT count(*) FROM tin_tuc {$dieukien}";
	$tintuc=mysqli_query($link,$strSQL);
	$row=mysqli_fetch_array($tintuc);
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
	
	$strSQL="SELECT * FROM tin_tuc {$dieukien} ORDER BY ma_tt desc Limit {$dongbatdau},{$kichthuoctrang}";
	$tintuc=mysqli_query($link,$strSQL);
?>

<form name="timtin" action="" method="post">
<table width="340" cellpadding="2" cellspacing="0" border="0" align="right" bgcolor="#66A111" style="color:#FFFFCC"> 
<tr><td align="center">
Tìm Kiếm Tin:
</td><td>
<input type="text" name="tukhoa" value="" style="width:200px;" />
</td><td>
<input name="trangchuyen" type="hidden" value="quanlytintuc" />
<input type="submit" value="Tìm" name="submit" />
</td></tr></table>
</form>

<table width="750" cellpadding="2" cellspacing="0" border="0" class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="right">
	<tr>
		<th width="40" align="center" style="border-left:#66A111 solid 1px;">
			STT
		</th>
		<th width="90" align="center">
			Mã Tin Tức
		</th>
		<th width="420">
			Tiêu Đề
		</th>
		<th width="200" colspan="2" style="background:#FFFFFF;" align="center">
			<a href="#" onclick="them_sua_tintuc('themtintuc')">Thêm Tin Tức Mới</a>
		</th>
	</tr>
	<?php $i=$dongbatdau; ?>
		<?php while($row=mysqli_fetch_array($tintuc)) { $i+=1; ?>
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
			<?php echo $row['ma_tt']; ?>
		</td>
		<td <?php echo $mausac; ?> >
			<a href="#" onclick="them_sua_tintuc('suatintuc','<?php echo $row['ma_tt']; ?>')"><?php echo $row['tieu_de']; ?></a>
		</td>
		<td width="100" align="center" <?php echo $mausac; ?>>
			<a href="#" onclick="them_sua_tintuc('suatintuc','<?php echo $row['ma_tt']; ?>')">Sửa</a>
		</td>
		<td width="100" align="center" <?php echo $mausac; ?>>
			<a href="#" onclick="xoa_tintuc('<?php echo $row['ma_tt']; ?>')">Xóa</a>
		</td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="5" height="30" align="center">
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
<form name="xoatintuc" action="" method="post">
	<input type="hidden" name="matintuc" value="" />
	<input name="trangchuyen" type="hidden" value="xltintuc" />
	<input name="goihamxuly" type="hidden" value="xoatintuc" />
</form>
<form name="themsuatintuc" action="" method="post">
	<input name="trangchuyen" type="hidden" value="" />
	<input name="matintuc" type="hidden" value="" />
</form>
<script>
	function xoa_tintuc(matintuc)
	{
		xoatintuc.matintuc.value=matintuc
		if(confirm("Bạn Có Thực Sự Muốn Xóa Tin Tức Này Không!"))
		xoatintuc.submit()
	}
	function them_sua_tintuc(trangden,matintuc)
	{
		themsuatintuc.trangchuyen.value=trangden
		themsuatintuc.matintuc.value=matintuc
		themsuatintuc.submit()
	}
</script>

<form name="hung1" method="post" action="">
	<input type="hidden" name="tranghienhanh" value="" />
	<input type="hidden" name="trangchuyen" value="quanlytintuc" />
</form>
<script>
	function sotrang(trang,masp)
	{
		hung1.tranghienhanh.value=trang
		hung1.submit()
	}
</script>