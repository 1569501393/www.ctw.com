
<?php
include 'phpqrcode.php'; 
$value = 'http://baidu.com'; //��ά������ 
$errorCorrectionLevel = 'L';//�ݴ���   // L��QR_ECLEVEL_L��7%����M��QR_ECLEVEL_M��15%����Q��QR_ECLEVEL_Q��25%����H��QR_ECLEVEL_H��30%��
$matrixPointSize = 6;//����ͼƬ��С 
//���ɶ�ά��ͼƬ 
QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2); 
$logo = 'logo.png';//׼���õ�logoͼƬ 
$QR = 'qrcode.png';//�Ѿ����ɵ�ԭʼ��ά��ͼ 
  
if ($logo !== FALSE) { 
 $QR = imagecreatefromstring(file_get_contents($QR)); 
 $logo = imagecreatefromstring(file_get_contents($logo)); 
 $QR_width = imagesx($logo);//��ά��ͼƬ��� 
 $QR_height = imagesy($logo);//��ά��ͼƬ�߶� 
 $logo_width = imagesx($QR);//logoͼƬ��� 
 $logo_height = imagesy($QR);//logoͼƬ�߶� 
 $logo_qr_width = $QR_width / 5; 
 $scale = $logo_qr_width/$logo_width; 
 $logo_qr_height = $logo_height/$scale; 
 $from_width = ($QR_width - $logo_qr_width) / 2; 
 //�������ͼƬ��������С 
 // imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,$logo_qr_height, $logo_width, $logo_height); 

 // var_dump($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,$logo_qr_height, $logo_width, $logo_height);  // resource(6) of type (gd) resource(8) of type (gd) int(60) int(60) int(0) int(0) int(30) float(20.929648241206) int(1194) int(833)
imagecopyresampled($logo,$QR,  $from_width, $from_width, 0, 0, $logo_qr_width,$logo_qr_height, $logo_width, $logo_height); 
var_dump($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,$logo_qr_height, $logo_width, $logo_height);
} 
//���ͼƬ 
imagepng($QR, 'helloweba.png'); 
echo '<img src="helloweba.png">'; 

