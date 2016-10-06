<?php
session_start();
function create_image2()
	{
		 $md5_hash = md5(rand(0,999));
		 $security_code = substr($md5_hash, 15, 5);
		 $_SESSION['security_code2'] = $security_code;
		 $width = 80;
		 $height = 25;
		 $image = ImageCreate($width, $height);
		 $white = ImageColorAllocate($image, 255, 255, 255);
		 $black = ImageColorAllocate($image, 0, 0, 0);
		 ImageFill($image, 0, 0, $black);
		 ImageString($image, 5, 20, 5, $security_code, $white);
		 header("Content-Type: image/jpeg");
		 ImageJpeg($image);
		 ImageDestroy($image);
	}
create_image2() ;
exit();
?>
