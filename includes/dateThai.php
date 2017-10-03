<?php

$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$thai_month_arr=array(
    "0"=>"",
    "1"=>"มกราคม",
    "2"=>"กุมภาพันธ์",
    "3"=>"มีนาคม",
    "4"=>"เมษายน",
    "5"=>"พฤษภาคม",
    "6"=>"มิถุนายน",    
    "7"=>"กรกฎาคม",
    "8"=>"สิงหาคม",
    "9"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"                 
);

function thai_date($time){



    
    global $thai_day_arr,$thai_month_arr;
    $thai_date_return="วัน".$thai_day_arr[date("w",$time)];
    $thai_date_return.= "ที่ ".date("j",$time);
    $thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
    $thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);
    $thai_date_return.= "  ".date("H:i",$time)." น.";
    return $thai_date_return;
}



function dateThai1($x){
/* $thai_m  =  array("01"=>"Á¡ÃÒ¤Á","02"=>"¡ØÁÀÒ¾Ñ¹¸ì","03"=>"ÁÕ¹Ò¤Á","04"=>"àÁÉÒÂ¹","05"=>"¾ÄÉÒ¤Á","06"=>"ÁÔ¶Ø¹ÒÂ¹","07"=>"¡Ã¡®Ò¤Á","08"=>"ÊÔ§ËÒ¤Á","09"=>"¡Ñ¹ÂÒÂ¹","10"=>"µØÅÒ¤Á","11"=>"¾ÄÈ¨Ô¡ÒÂ¹","12"=>"¸Ñ¹ÇÒ¤Á"); */
//$thai_m  =  array("Á¡ÃÒ¤Á","¡ØÁÀÒ¾Ñ¹¸ì","ÁÕ¹Ò¤Á","àÁÉÒÂ¹","¾ÄÉÒ¤Á","ÁÔ¶Ø¹ÒÂ¹","¡Ã¡®Ò¤Á","ÊÔ§ËÒ¤Á","¡Ñ¹ÂÒÂ¹","µØÅÒ¤Á","¾ÄÈ¨Ô¡ÒÂ¹","¸Ñ¹ÇÒ¤Á");
$thai_m  =  array("Á¤","¡¾","ÁÕ¤","àÁÂ","¾¤","ÁÔÂ","¡¤","Ê¤","¡Â","µ¤","¾Â","¸¤");

/* $yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
$yy+=543;
$dateT=interval($dd)." ".$month_name[$mm]." ".$yy." ".$time;
return $dateT; */
$date_array=explode("-",$x);
$y=$date_array[0];
$m=$date_array[1]-1;
$d=$date_array[2];
$m=$thai_m[$m];
$y=$y+=543;
$dateThai="$d $m $y";
return $dateThai;


}

function monththai($x){
$thai_m  =  array("Á¡ÃÒ¤Á","¡ØÁÀÒ¾Ñ¹¸ì","ÁÕ¹Ò¤Á","àÁÉÒÂ¹","¾ÄÉÒ¤Á","ÁÔ¶Ø¹ÒÂ¹","¡Ã¡®Ò¤Á","ÊÔ§ËÒ¤Á","¡Ñ¹ÂÒÂ¹","µØÅÒ¤Á","¾ÄÈ¨Ô¡ÒÂ¹","¸Ñ¹ÇÒ¤Á");
$y=$date_array[0];
$m=$thai_m[$m];
$dateThai="$m";
return $dateThai;

}
function xlsBOF() { 
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);  
    return; 
} 

function xlsEOF() { 
    echo pack("ss", 0x0A, 0x00); 
    return; 
} 

function xlsWriteNumber($Row, $Col, $Value) { 
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0); 
    echo pack("d", $Value); 
    return; 
} 

function xlsWriteLabel($Row, $Col, $Value ) { 
    $L = strlen($Value); 
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L); 
    echo $Value; 
return; 
} 
?> 

 

