// http://www.thinkphp.cn/topic/44760.html
<?php
include 'phpqrcode.php'; 
$value = 'http://baidu.com'; //二维码内容 
$errorCorrectionLevel = 'L';//容错级别 
$matrixPointSize = 9;//生成图片大小 
//生成二维码图片 
//QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);
$logo = 'qrcode_'.time().'.png';


QRcode::png($value, $logo, $errorCorrectionLevel, $matrixPointSize, 2);
/*$logo = 'logo.png';//准备好的logo图片
$QR = 'qrcode.png';//已经生成的原始二维码图 */

//$logo = 'qrcode.png';//准备好的logo图片
$QR = 'logo.png';//已经生成的原始二维码图  背景图

if ($logo !== FALSE) { 
 $QR = imagecreatefromstring(file_get_contents($QR)); 
 $logo_file = imagecreatefromstring(file_get_contents($logo));

 $QR_width = imagesx($QR);//二维码图片宽度 
 $QR_height = imagesy($QR);//二维码图片高度 
 $logo_width = imagesx($logo_file);//logo图片宽度
 $logo_height = imagesy($logo_file);//logo图片高度
 $logo_qr_width = $QR_width / 2.5; 
 $scale = $logo_width/$logo_qr_width; 
 $logo_qr_height = $logo_height/$scale; 
 $from_width = ($QR_width - $logo_qr_width) / 2; 
 //重新组合图片并调整大小 
 imagecopyresampled($QR, $logo_file, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
} 
//imagedestroy($logo);

//输出图片 
imagepng($QR, 'helloweba.png');

echo '<img src="helloweba.png">';
//unlink('qrcode_1493369860.png');
//unlink((string)$logo);

unlink($logo);

// imagedestroy($logo);



