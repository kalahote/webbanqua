<?php 
	@session_start();
 	include('include/ketnoi.php'); 
	//kiem Tra Dang Nhap
	$thongbaoTK="";
	if(isset($_POST['txttendangnhap']) && isset($_POST['txtpass']))
	{	
		$tendangnhap=$_POST['txttendangnhap'];
		$pass=$_POST['txtpass'];
		
		$strSQL="SELECT *  FROM khach_hang WHERE ten_dn = '{$tendangnhap}' AND mat_khau = '{$pass}'";
		$khachhang=mysqli_query($link,$strSQL);
		
		//Kiem Tra Du Lieu-Neu Co Luu Vao SS-Neu Khong Bao Loi//
		if(mysqli_num_rows($khachhang)>0)
		{
			//lay ten luu vao SS//
			$rowDN=mysqli_fetch_array($khachhang);
			$_SESSION['hovaten']=$rowDN['ho_kh']." ".$rowDN['ten_kh'];
			$_SESSION['makhachhang']=$rowDN['ma_kh'];
		}
		else
			$thongbaoTK="Sai Tên Đăng Nhập Hoặc Mật Khẩu";
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<title>Tech Team</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="description" content="Parallax Content Slider with CSS3 and jQuery" />
<meta name="keywords" content="slider, animations, parallax, delayed, easing, jquery, css3, kendo UI" />
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
<link rel="stylesheet" type="text/css" href="help/css/reset.css" />
<link rel="stylesheet" type="text/css" href="help/css/style.css" />
<link rel="stylesheet" type="text/css" href="js/slider/themes/default/jquery.slider.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/slider/jquery.slider.min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".slider").slideshow({
        width      : 1205,
        height     : 250,
        pauseOnHover : false,
        transition : ['slideLeft', 'slideRight', 'slideTop', 'slideBottom']
      });
      
      $(".caption").fadeIn(300);

      // playing with events:
      
      $(".slider").bind("sliderChange", function(event, curSlide) {
        $(curSlide).children(".caption").hide();
      });
      
      $(".slider").bind("sliderTransitionFinishes", function(event, curSlide) {
        $(curSlide).children(".caption").fadeIn(300);
      });
    });
  </script>
<link href='http://fonts.googleapis.com/css?family=Economica:700,400italic' rel='stylesheet' type='text/css'>
<noscript>
<link rel="stylesheet" type="text/css" href="css/nojs.css" />
</noscript>
<title>
<?php 
$view="trang chu";
if(isset($_REQUEST['view']))
{$view=$_REQUEST['view'];
if($view==""){
echo "Trang Chủ";
}
else
	echo $view; 
}
?>
</title>
<script language="javascript" src="include/giohang/Calendar.js">
</script>
<link href="include/giohang/Calendar.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="mtp">
    <div class="wrapper">
		<div class="box">
			<div class="shell clearfix">
				<div class="banner">
					<?php include('banner.php'); ?>
				</div>
				
				<div class="menuleft">
					<?php include('menuleft.php');?>
				</div>
				
				<div class="main clearfix">
					<table width="1000" cellpadding="0" cellspacing="0" border="0" height="550px">
						<tr>
							<td width="593" valign="top">
							<?php 
								if(isset($_REQUEST['view']))
								{
									$manhinh=$_REQUEST['view'];
									
									if($manhinh=='trangchu')	
										include_once('include/main.php');
									else if($manhinh=='gioithieu')
										include_once('include/dichvu/gioithieu.php');
									else if($manhinh=='dichvu')
										include_once('include/dichvu/dichvu.php');
									else if($manhinh=='dathang')
										include_once('include/giohang/giohang.php');
									else if($manhinh=='lienhe')
										include_once('include/dichvu/lienhe.php');
									else if($manhinh=='sanpham')
										include_once('include/sanpham/sanpham.php');
									else if($manhinh=='tintuc')
										include_once('include/tintuc/danhmuctin.php');
									else if($manhinh=='chitiet')
										include_once('include/sanpham/sanphamchitiet.php');
									else if($manhinh=='chitiettintuc')
										include_once('include/tintuc/chitiet.php');
										
									//////////////////////////////////////////////////////	
									else if($manhinh=='dangky')
										include_once('include/taikhoan/dangky.php');
									else if($manhinh=='thongtintaikhoan')
										include_once('include/taikhoan/thongtin.php');		
									else if($manhinh=='timmatkhau')
										include_once('include/taikhoan/timmatkhau.php');	
									/////////////////////////////////////////////////////	
									else if($manhinh=='xltaikhoan')
										include_once('include/taikhoan/xl_taikhoan.php');	
									else if($manhinh=='xllienhe')
										include_once('include/dichvu/xl_lienhe.php');	
									/////////////////////////////////////////////////////	
									else if($manhinh=='manhinhtimkiem')
										include_once('include/timkiem/ketquatim.php');
									else if($manhinh=='timnangcao')
										include_once('include/timkiem/ketquatimkiemnangcao.php');
										
									else echo"<center>Không Có Dữ Liệu</center>";
									}
								else
									include_once('include/main.php');
							?>
							</td>
							<td width="220" valign="top">
							<?php include("menuright.php");?>
							</td>
						</tr>
					</table>
				</div>
				
				<div class="ngan">
				</div>
				
				<div class="bottom">
					<?php include('bottom.php') ;?>
				</div>
			</div>
		</div>
	</div>	
</div>	
</body>
</html>
