
<?php
include 'phpqrcode.php'; 
$value = 'http://baidu.com'; //二维码内容 
$errorCorrectionLevel = 'L';//容错级别   // L（QR_ECLEVEL_L，7%），M（QR_ECLEVEL_M，15%），Q（QR_ECLEVEL_Q，25%），H（QR_ECLEVEL_H，30%）
$matrixPointSize = 6;//生成图片大小 
//生成二维码图片 
QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2); 
$logo = 'logo.png';//准备好的logo图片 
$QR = 'qrcode.png';//已经生成的原始二维码图 
  
if ($logo !== FALSE) { 
 $QR = imagecreatefromstring(file_get_contents($QR)); 
 $logo = imagecreatefromstring(file_get_contents($logo)); 
 $QR_width = imagesx($logo);//二维码图片宽度 
 $QR_height = imagesy($logo);//二维码图片高度 
 $logo_width = imagesx($QR);//logo图片宽度 
 $logo_height = imagesy($QR);//logo图片高度 
 $logo_qr_width = $QR_width / 5; 
 $scale = $logo_qr_width/$logo_width; 
 $logo_qr_height = $logo_height/$scale; 
 $from_width = ($QR_width - $logo_qr_width) / 2; 
 //重新组合图片并调整大小 
 // imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,$logo_qr_height, $logo_width, $logo_height); 

 // var_dump($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,$logo_qr_height, $logo_width, $logo_height);  // resource(6) of type (gd) resource(8) of type (gd) int(60) int(60) int(0) int(0) int(30) float(20.929648241206) int(1194) int(833)
imagecopyresampled($logo,$QR,  $from_width, $from_width, 0, 0, $logo_qr_width,$logo_qr_height, $logo_width, $logo_height); 
var_dump($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,$logo_qr_height, $logo_width, $logo_height);
} 
//输出图片 
imagepng($QR, 'helloweba.png'); 
echo '<img src="helloweba.png">'; 

