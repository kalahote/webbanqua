<?php
//phan trang
$dieukien="";
$strSQL="SELECT count(*) FROM lien_he {$dieukien}";
	$lienhe=mysqli_query($link,$strSQL);
	$row=mysqli_fetch_array($lienhe);
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
	
	$strSQL="SELECT * FROM lien_he {$dieukien} ORDER BY ma_lh desc Limit {$dongbatdau},{$kichthuoctrang}";
	$lien_he=mysqli_query($link,$strSQL);
?>
<table width="750" cellpadding="2" cellspacing="0" border="0" class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="right">
	<tr>
		<th width="40" align="center" style="border-left:#66A111 solid 1px;">
			STT
		</th>
		<th width="90" align="center">
			Mã Liên Hệ
		</th>
		<th width="220">
			Tên Người Liên Hệ
		</th>
		<th width="200">
			Thời Gian Liên Hệ
		</th>
		<th width="200" colspan="2" style="background:#FFFFFF;" align="center">
			
		</th>
	</tr>
	<?php $i=$dongbatdau; ?>
		<?php while($row=mysqli_fetch_array($lien_he)) { $i+=1; ?>
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
			<?php echo $row['ma_lh']; ?>
		</td>
		<td <?php echo $mausac; ?> >
			<a href="#" onclick="chi_tiet('<?php echo $row['ma_lh']; ?>')"><?php echo $row['ten_nguoi_lh']; ?></a>
		</td>
		<td <?php echo $mausac; ?>><?php echo $row['ngay_lh']; ?>
		</td>
		<td width="100" align="center" <?php echo $mausac; ?>>
			<a href="#" onclick="chi_tiet('<?php echo $row['ma_lh']; ?>')">Xem</a>
		</td>
		<td width="100" align="center" <?php echo $mausac; ?>>
			<a href="#" onclick="xoa_lienhe('<?php echo $row['ma_lh']; ?>')">Xóa</a>
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

<form action="" method="post" name="lienhe">
	<input name="malienhe" type="hidden" value="" />
	<input name="trangchuyen" type="hidden" value="xllienhe" />
	<input name="goihamxuly" type="hidden" value="xoalienhe" />
</form>
<form action="" method="post" name="chitietlienhe">
	<input name="malienhe" type="hidden" value="" />
	<input name="trangchuyen" type="hidden" value="chitietlienhe" />
</form>
<script>
	function xoa_lienhe(malienhe)
	{
		lienhe.malienhe.value=malienhe
		if(confirm('bạn có muốn xóa liên hệ của khách hàng này không..!'))
		lienhe.submit()
	}
	
	function chi_tiet(malienhe)
	{
		chitietlienhe.malienhe.value=malienhe
		chitietlienhe.submit()
	}
</script>


<form name="hung1" method="post" action="">
	<input type="hidden" name="tranghienhanh" value="" />
	<input type="hidden" name="trangchuyen" value="quanlylienhe" />
</form>
<script>
	function sotrang(trang,masp)
	{
		hung1.tranghienhanh.value=trang
		hung1.submit()
	}
</script>