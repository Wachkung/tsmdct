<?php
//session_start();
##################time out
set_time_limit(0);
###########################

function connectToDB() {
    
    $hostdb = 'localhost';
    $userdb = 'root';
    $passdb = '212224236';
    $namedb = 'hi';
    
    $connect = mysql_connect ($hostdb, $userdb, $passdb);
    mysql_query("SET character_set_results=tis620");
    mysql_query("SET character_set_client=tis620");
    mysql_query("SET character_set_connection=tis620");
    
    /* mysql_query("SET character_set_results=utf-8");
    mysql_query("SET character_set_client=utf-8");
    mysql_query("SET character_set_connection=utf-8"); */
    
    if (!$connect) {
        
        die('Could not connect: ' . mysql_error());
    }
    
    $db_selected = mysql_select_db($namedb);
    if (!$db_selected) {
        die ('Can\'t use database : ' . mysql_error());
    }
    return $connect;
}
function tis620_to_utf8($tis) {
    for( $i=0 ; $i< strlen($tis) ; $i++ ){
        $s = substr($tis, $i, 1);
        $val = ord($s);
        if( $val < 0x80 ){
            $utf8 .= $s;
        } elseif ((0xA1 <= $val and $val <= 0xDA)
        or (0xDF <= $val and $val <= 0xFB)) {
            $unicode = 0x0E00 + $val - 0xA0;
            $utf8 .= chr( 0xE0 | ($unicode >> 12) );
            $utf8 .= chr( 0x80 | (($unicode >> 6) & 0x3F) );
            $utf8 .= chr( 0x80 | ($unicode & 0x3F) );
        }
    }
    return $utf8;
}
function utf8_to_tis620($string) {
    $str = $string;
    $res = "";
    for ($i = 0; $i < strlen($str); $i++) {
        if (ord($str[$i]) == 224) {
            $unicode = ord($str[$i+2]) & 0x3F;
            $unicode |= (ord($str[$i+1]) & 0x3F) << 6;
            $unicode |= (ord($str[$i]) & 0x0F) << 12;
            $res .= chr($unicode-0x0E00+0xA0);
            $i += 2;
        } else {
            $res .= $str[$i];
        }
    }
    return $res;
}
?>