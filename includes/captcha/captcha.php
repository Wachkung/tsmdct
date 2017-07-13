<?php
session_start();	//เริ่ม session

$captchaTextSize = 6;		//ความยาวของรหัส ใช้  6 ตัวอักษร
$md5Hash = md5(microtime().'itbookonline');		//สุ่มตัวเลขขึ้นมารวมกับข้อความที่เป็นรหัสลับ
$key = substr($md5Hash, 0, $captchaTextSize);	//ตัดข้อความให้เหลือเพียง 6 ตัวอักษร

$_SESSION['captchaKey'] = md5($key);			//นำเอาข้อความเข้ารหัส แล้วเก็บใน $_SESSION['captchaKey']

$captchaImage = imagecreatefrompng("images/captcha.png");
//เลือกรูปภาพที่จะใช้เป็นพื้นหลัง
$textColor    = imagecolorallocate($captchaImage, 78, 97, 78);
//กำหนดสีของตัวอักษร
$lineColor    = imagecolorallocate($captchaImage, 78, 97, 78);
//กำหนดสีของเส้น
$imageInfo    = getimagesize("images/captcha.png");	//หาขนาดของรูปภาพ

$linesToDraw = 20;		//จำนวนเส้นที่จะวาด

for($i = 0; $i < $linesToDraw; $i++)  	//วนลูปเพื่อวาดเส้นทีละเส้น
{
    $xStart = mt_rand( 0, $imageInfo[0]);	//สุ่มตำแหน่งจุดเริ่มต้นเพื่อวาดเส้น
    $xEnd = mt_rand( 0, $imageInfo[0]);		//สุ่มตำแหน่งจุดสิ้นสุดเพื่อวาดเส้น
    //ลงมือวาดเส้นไปที่ภาพ
    imageline( $captchaImage, $xStart, 0, $xEnd, $imageInfo[1], $lineColor );
}
//วาดอักษรลงในภาพ
imagettftext($captchaImage, 20, 0, 25, 44, $textColor, "fonts/tesox.ttf", $key );
imagepng($captchaImage);	//แสดงผลลัพธ์เป็นภาพออกมา