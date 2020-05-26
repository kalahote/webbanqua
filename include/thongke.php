<?php
	//dem so loai qua
	$strSQL="SELECT COUNT(*) FROM loai_qua";
	$so_loai_qua=mysqli_query($link,$strSQL);
	$rowLOAI=mysqli_fetch_array($so_loai_qua);
	$soloaiqua=$rowLOAI[0];
	//dem so qua
	$strSQL="SELECT COUNT(*) FROM qua";
	$so_qua=mysqli_query($link,$strSQL);
	$rowqua=mysqli_fetch_array($so_qua);
	$soqua=$rowqua[0];
	//dem so khach hang
	$strSQL="SELECT COUNT(*) FROM khach_hang";
	$khach_hang=mysqli_query($link,$strSQL);
	$rowKHACH=mysqli_fetch_array($khach_hang);
	$khachhang=$rowKHACH[0];
	//dem so tin tuc
	$strSQL="SELECT COUNT(*) FROM tin_tuc";
	$tin_tuc=mysqli_query($link,$strSQL);
	$rowTIN=mysqli_fetch_array($tin_tuc);
	$tintuc=$rowTIN[0];
	//dem so lien he
	$strSQL="SELECT COUNT(*) FROM lien_he";
	$lien_he=mysqli_query($link,$strSQL);
	$rowLH=mysqli_fetch_array($lien_he);
	$lienhe=$rowLH[0];
	//dem so don dat hang
	$strSQL="SELECT COUNT(*) FROM dondathang";
	$dondathang=mysqli_query($link,$strSQL);
	$rowDDH=mysqli_fetch_array($dondathang);
	$dondathang=$rowDDH[0];
	//Tính doanh so
	$strSQL="SELECT SUM(gia_ban*sl_dat) FROM ct_dondathang";
	$doanhthu=mysqli_query($link,$strSQL);
	$rowDT=mysqli_fetch_array($doanhthu);
	$doanhthu=$rowDT[0];
?>