<!--?php
	session_start();
	$captcha=imagecreatefromgif('nencaptcha.gif');
	
	$mauden=imagecolorallocate($captcha,0,0,0);
	$mautrang=imagecolorallocate($captcha,225,225,225);
	///////////////////////////////////
	$font="Vnarial.ttf";
	$string=md5(microtime()* mktime());
	$text=substr($string,0,8);
	$_SESSION['maxacnhan']=$text;
	
	imagettftext($captcha,15,0,20,27,$mautrang,$font,$text);
	imagepng($captcha);
	
	///////////////////////////////////
	imagedestroy($captcha);
?>
--Test
<?php
$length=5;
if(isset($_GET["len"]))
$length=$_GET["len"];
session_start();
$md5 = md5(rand());
$text = substr($md5,0,$length);
$captcha = imagecreatefrompng("D:/Xampp/htdocs/webbanqua/include/taikhoan/nencaptcha.gif");
$font=4;
for($i=0;$i<20;$i++)
imageline ( $captcha , rand(0,100) , rand(0,100) , rand(0,100),rand(0,100),rand(0,100000));
$image_width=imagesx($captcha);
$image_height=imagesy($captcha);
$text_width=imagefontwidth($font)*$length;
$text_height=imagefontheight($font);
imagestring($captcha, $font, ($image_width-$text_width)/2 , ($image_height-$text_height)/2, $text, 0);
$_SESSION['captcha'] = md5($text);
header("Content-type: image/png");
imagepng($captcha);
imagedestroy($captcha);
?>