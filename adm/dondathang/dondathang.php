<?php
	if($_SESSION['phanquyen']!='admin')
	{
	?>
	<p class='pp'><center>Bạn Không Đủ Quyền Quản Lý Mục Này
	<br />
	<a href="index.php">Bấm Vào Đậy Để Quay Lại Trang Chủ!</a>
	</center>
	</p>
<?php 
	} 
	else
	{

//tim don chua giao
$dieukien="";
if(isset($_POST['hientrang']))
	{
		$tk=$_POST['hientrang'];
		$dieukien="WHERE hien_trang={$tk}";
	}
//phan hien thi trang them va sua
	if(isset($_POST['chentrang']))
	{
		$chucnang=$_POST['chentrang'];
		if($chucnang=='themqua')
			include_once('qua/themqua.php');
		else if($chucnang=='suaqua')
			include_once('qua/suaqua.php');
	}

//phan trang
$strSQL="SELECT count(*) FROM  dondathang {$dieukien}";
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
	
	$strSQL="SELECT * FROM  dondathang {$dieukien} ORDER BY ma_dh desc Limit {$dongbatdau},{$kichthuoctrang}";
	$dondathang=mysqli_query($link,$strSQL);
	//////////////////////////////////////////////////////////////
?>
<table width="750" cellpadding="2" cellspacing="0" border="0" class="admintable" style="border-right:#E9E9E9 1px solid; border-top:#E9E9E9 1px solid;" align="right">
	<tr>
		<th width="40" align="center" style="border-left:#66A111 solid 1px;">
			STT
		</th>
		<th width="90" align="center">
			Mã Đơn
		</th>
		<th width="220">
			Tên Khách Đặt Hàng
		</th>
		<th width="200">
			Hiện Trạng
		</th>
		<th width="200" colspan="2" style="background:#FFFFFF;" align="center">
			<a href="#" onclick="timdon()">Các Đơn Đặt Hàng Chưa Giao</a>
		</th>
	</tr>
	<?php $i=$dongbatdau; ?>
		<?php while($row=mysqli_fetch_array($dondathang)) { $i+=1; ?>
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
			<?php echo $row['ma_dh']; ?>
		</td>
		<td <?php echo $mausac; ?> >
		<?php 
			//lay chi tiet cua khach hang 
			$strSQL2="SELECT * FROM khach_hang WHERE ma_kh={$row['ma_kh']}";
			$khachhang=mysqli_query($link,$strSQL2);
			$rowKH=mysqli_fetch_array($khachhang);
			
		?>
			<?php echo $rowKH['ho_kh']." ".$rowKH['ten_kh']; ?>
		</td>
		<td <?php echo $mausac; ?> >
			<?php 
			if($row['hien_trang']==0)
				echo "Chưa Giao";
			else
				echo "<font color='#D4D0C8'> Đã Giao Hàng </font>";
			?>
		</td>
		<td width="100" align="center" <?php echo $mausac; ?>>
			<a href="#" onclick="xem_dondathang('<?php echo $row['ma_dh']; ?>','chitiet_dh')">Xem</a>
		</td>
		<td width="100" align="center" <?php echo $mausac; ?>>
			<a href="#" onclick="xoa_dondathang('<?php echo $row['ma_dh']; ?>','xl_dondathang','xoadh')">Xóa</a>
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
<?php } ?>
<form name="hung1" method="post" action="">
	<input type="hidden" name="tranghienhanh" value="" />
	<input type="hidden" name="trangchuyen" value="quanlydondathang" />
</form>
<script>
	function sotrang(trang)
	{
		hung1.tranghienhanh.value=trang
		hung1.submit()
	}
</script>
<form name="xldathang" action="" method="post">
	<input type="hidden" name="trangchuyen" value="" />
	<input type="hidden" name="goiham" value="xoadh" />
	<input type="hidden" name="madh" value="" />
</form>
<script>
	function xoa_dondathang(ma,trang,hanhdong)
	{
		xldathang.madh.value=ma
		xldathang.trangchuyen.value=trang
		xldathang.goiham.value=hanhdong
		if(confirm('bạn có thực sự muốn xóa đơn đặt hàng này không!'))
		xldathang.submit()
	}
	
	function xem_dondathang(ma,trang)
	{
		xldathang.madh.value=ma
		xldathang.trangchuyen.value=trang
		xldathang.submit()
	}
</script>
<form name="giaonhan" action="" method="post">
	<input type="hidden" name="trangchuyen" value="quanlydondathang" />
	<input type="hidden" name="hientrang" value="0" />
</form>
<script>
	function timdon()
	{
		giaonhan.submit()
	}
</script>