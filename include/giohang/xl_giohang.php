<?php 
$thongtin="";
if(!isset($_SESSION['arrmasp']))
{
	
	$arrmasp=array();
	$arrtensp=array();
	$arrsoluong=array();
	$arrdongia=array();
	$n=0;
	
	
	$_SESSION['arrmasp']=$arrmasp;
	$_SESSION['arrtensp']=$arrtensp;
	$_SESSION['arrsoluong']=$arrsoluong;
	$_SESSION['arrdongia']=$arrdongia;
	$_SESSION['n']=$n;
}
//--------------------------------------------------------
$hanhdong="";
if (isset($_REQUEST['hanhdong']))
{
	$hanhdong=$_REQUEST['hanhdong'];
		if($hanhdong=='xoasanpham')
			xoasanphamtronggio();
		else if($hanhdong=='them')
			themsptronggio();
		else if($hanhdong=='capnhatgiohang')
			capnhatsoluong();
		else if($hanhdong=='thanhtoan')
			$thongtin=thanhtoan();
}	

function themsptronggio()
{
	$arrmasp=$_SESSION['arrmasp'];
	$arrtensp=$_SESSION['arrtensp'];
	$arrsoluong=$_SESSION['arrsoluong'];
	$arrdongia=$_SESSION['arrdongia'];
	$n=$_SESSION['n'];
	
	if(isset($_REQUEST['txtmasp']))
	 	$masp=$_REQUEST['txtmasp'];
	if(isset($_REQUEST['txttensp']))
	 	$tensp=$_REQUEST['txttensp'];
	if(isset($_REQUEST['txtdongia']))
	 	$dongia=$_REQUEST['txtdongia'];
	
	$daco=0;
	for($i=0; $i<$n; $i++)
	if ($arrmasp[$i]==$masp)
	{
		$arrsoluong[$i]+=1;
		$daco=1;
		break;
	}
		
	if ($daco==0)
	{		
		$arrmasp[$n]=$masp;
		$arrtensp[$n]=$tensp;
		$arrsoluong[$n]=1;
		$arrdongia[$n]=$dongia;
		
		$n=$n+1;		
	}
	$_SESSION['arrmasp']=$arrmasp;
	$_SESSION['arrtensp']=$arrtensp;
	$_SESSION['arrsoluong']=$arrsoluong;
	$_SESSION['arrdongia']=$arrdongia;
	$_SESSION['n']=$n;
}

function capnhatsoluong()
{
	$arrmasp=$_SESSION['arrmasp'];
	$arrtensp=$_SESSION['arrtensp'];
	$arrsoluong=$_SESSION['arrsoluong'];
	$arrdongia=$_SESSION['arrdongia'];
	$n=$_SESSION['n'];
	
	for($i=0; $i<$n; $i++)
	{
		$solg = intval($_REQUEST["txtsl{$i}"]);
		if($solg>0)
			$arrsoluong[$i] = $solg;
	}
	
	$_SESSION['arrmasp']=$arrmasp;
	$_SESSION['arrtensp']=$arrtensp;
	$_SESSION['arrsoluong']=$arrsoluong;
	$_SESSION['arrdongia']=$arrdongia;
	$_SESSION['n']=$n;
}	
function xoasanphamtronggio()
{	
	$arrmasp=$_SESSION['arrmasp'];
	$arrtensp=$_SESSION['arrtensp'];
	$arrsoluong=$_SESSION['arrsoluong'];
	$arrdongia=$_SESSION['arrdongia'];
	$n=$_SESSION['n'];
	if(isset($_REQUEST['masp']))
	 	$maspxoa=$_REQUEST['masp'];
	
	$vtxoa=-1;
	for($i=0; $i<$n; $i++)
	if ($arrmasp[$i]==$maspxoa)
	{
		$vtxoa=$i;
		break;
	}
		
	if ($vtxoa>-1)
	{
		for($i=$vtxoa; $i<$n-1; $i++)
		{
			$arrmasp[$i]=$arrmasp[$i+1];
			$arrtensp[$i]=$arrtensp[$i+1];
			$arrsoluong[$i]=$arrsoluong[$i+1];
			$arrdongia[$i]=$arrdongia[$i+1];
		}
		$n=$n-1;
	}
	
	$_SESSION['arrmasp']=$arrmasp;
	$_SESSION['arrtensp']=$arrtensp;
	$_SESSION['arrsoluong']=$arrsoluong;
	$_SESSION['arrdongia']=$arrdongia;
	$_SESSION['n']=$n;
}
 function thanhtoan()
{	
	global $link;
	$arrmasp=$_SESSION['arrmasp'];
	$arrtensp=$_SESSION['arrtensp'];
	$arrsoluong=$_SESSION['arrsoluong'];
	$arrdongia=$_SESSION['arrdongia'];
	$n=$_SESSION['n'];
	
	 if(isset($_POST['makhachhang']))
	 	$makhachhang=$_POST['makhachhang'];	
	 if(isset($_POST['ngaygiao']))
	 	$ngaygiao=$_POST['ngaygiao'];
	 if(isset($_POST['diachigiao']))
	 	$diachigiao=$_POST['diachigiao'];

	//luu thong tin vao don dat hang
	$strSQL="INSERT INTO dondathang (ma_kh,ngay_gh,noi_giao) VALUES({$makhachhang},'{$ngaygiao}','{$diachigiao}')";
 	mysqli_query($link,$strSQL);
	
	//Lay mahd 
	$mahd=mysqli_insert_id($link);

	//luu thong tin qua don chi tiet
	for($i=0; $i<$n; $i++)
	{
	$strSQL="INSERT INTO ct_dondathang (ma_dh,ma_qua,gia_ban,sl_dat) VALUES({$mahd},{$arrmasp[$i]},{$arrdongia[$i]},{$arrsoluong[$i]})";
	mysqli_query($link,$strSQL);
	}
	
	$_SESSION['n']=0;
	return "Bạn Đã Đặt Hàng Thành Công !";
}
?>
