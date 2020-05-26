<?php 

	//phan trang
$strSQL="SELECT count(*) FROM tin_tuc";
	$tin=mysqli_query($link,$strSQL);
	$row=mysqli_fetch_array($tin);
	$sodong=$row[0];
	
	$kichthuoctrang=5;
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
	
	$strSQL="SELECT * FROM tin_tuc ORDER BY ma_tt desc Limit {$dongbatdau},{$kichthuoctrang}";
	$tintucmoinhat=mysqli_query($link,$strSQL);
	

?>
<div style="width:587px; margin-left:3px; margin-right:3px;">
  <table width="587" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td style="height:25px; background:url(images/trang.jpg) repeat-x;" align="center" class="ht" colspan="3"> Danh Sách Tin Tức </td>
    </tr>
    <tr>
      <td>
	  			<?php 
				
					// danh sach tin tuc
					while($rowTINMOI=mysqli_fetch_array($tintucmoinhat))
					{
				?>
          <table width="719" cellpadding="0" cellspacing="0" border="0" style="border:#CCCCCC 1px solid; margin-top:3px;">
            <tr>
              <td><a href="#" onclick="chitiet_tt('<?php echo $rowTINMOI['ma_tt']; ?>')"> <img src="images/tintuc/<?php echo $rowTINMOI['hinh_anh'] ?>" width="150" height="90" 
						style="border:#999999 1px solid; margin:10px;" align="left" /> </a>
                  <p class="pp"> <a href="#" onclick="chitiet_tt('<?php echo $rowTINMOI['ma_tt']; ?>')"><b><?php echo $rowTINMOI['tieu_de'] ?></b></a> <br />
                      <?php if(strlen($rowTINMOI['noi_dung']) > 120) { ?>
                      <?php echo substr($rowTINMOI['noi_dung'], 0, 110)?>...
                    <?php } else { ?>
                    <?php echo $rowTINMOI['noi_dung']; } ?> <br />
                  <a href="#" onclick="chitiet_tt('<?php echo $rowTINMOI['ma_tt']; ?>')">Xem Chi Tiết...</a> </p></td>
            </tr>
          </table>
        <?php } ?>
      </td>
    </tr>
 <tr>
		<td colspan="6" height="30" align="center">
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
</div>
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
</script>

<form name="trung1" method="post" action="">
	<input type="hidden" name="tranghienhanh" value="" />
	<input type="hidden" name="view" value="tintuc" />
</form>
<script>
	function sotrang(trang,masp)
	{
		trung1.tranghienhanh.value=trang
		trung1.submit()
	}
</script>