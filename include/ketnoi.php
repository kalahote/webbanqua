<?php
	$link=mysqli_connect("localhost","root","") or die('Khong The Ket Noi Voi May Chu');
	$strSQL=mysqli_select_db($link,'traicay');
	mysqli_query($link,"SET NAMES 'utf8'");
?>