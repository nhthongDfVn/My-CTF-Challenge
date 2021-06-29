<?php 
$flag='ANHTOICTF{Tung_yeu_nhau_tung_la_cua_nhau_that_lau_Den_sau_cung_chang_the_co_nhau_bac_dau_https://www.youtube.com/watch?v=UqKVL56IJB8}';


function checkNum($num){
	 echo 'Your number: '.$num.' -> Wrong number';
	#echo ob_get_length(); 
	if (ob_get_length()>4094)
	 	return 1;
	 else return 0;
}
?>
