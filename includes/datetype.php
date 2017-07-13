<?php
function datetype($date) {
		list( $syear,  $smonth, $sday) = explode("-", $date);
		$syear+=543;
		$date =  $sday. '/' . $smonth . '/' . $syear;
		return $date;

}
 
 function dateEnglish($date) {
		list( $sday,  $smonth, $syear) = explode("/", $date);
	//	$syear-=543;
	//	$date =  $syear. '-' . $smonth . '-' .$sday ;
		
	 	$date =  $syear. '-' . $smonth . '-' .$sday ;
	//	$date =  $syear. '' . $smonth . '' .$sday ;
		
		return $date;

}
 
 function dateEnglish2($date) {
		list( $sday,  $smonth, $syear) = explode("/", $date);
		$syear-=544;
		$date =  $syear. '-' . $smonth . '-' .$sday ;
		return $date;

} 
 
 
 
?>
