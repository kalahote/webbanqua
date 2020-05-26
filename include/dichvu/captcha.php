<?php
	session_start();
	$captcha=imagecreatefromgif('nencaptcha.gif');
	
	$mauden=imagecolorallocate($captcha,0,0,0);
	$mautrang=imagecolorallocate($captcha,225,225,225);
	///////////////////////////////////
	$font="D:/Xampp/htdocs/webbanqua/include/dichvu/Vnarial.ttf";
	$string=md5(microtime() * mktime());
	$text=substr($string,0,8);
	$_SESSION['maxacnhan']=$text;
	
	imagettftext($captcha,15,0,20,27,$mautrang,$font,$text);
	imagepng($captcha);
	
	///////////////////////////////////
	imagedestroy($captcha);
?>