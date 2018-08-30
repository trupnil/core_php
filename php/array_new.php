<?php
$a = array('darpan','jayesh','tushar');
//echo $a;
//print_r($a);
$city = array("gujarat"=>"vadodara","mh"=>"mumbai");
//print_r($city);
$state = array("gujarat"=>array('vadodara','surat'),"rajasthan" =>array('jaipur','udaipur'));
//echo "<pre>";
//print_r($state);

$animal = array("a"=>"tiger","b"=>"lion");
$animal1 = array("c"=>"zebra","b"=>"lion");
//$r = array_diff($animal1,$animal);
$r = array_merge($animal1,$animal);
//$aa = array_keys($animal); 
//$aa = array_values($animal);
echo "<pre>";
print_r($r);
$f  = array("apple"=>"qqq","mango"=>"mmm","ddd"=>"bbb");
//$no = array("0"=>"5","1"=>"10","2"=>"15");

//$mim = array_combine($animal,$f);
///$res = array_reverse($f);
//$res = array_search("mmm",$f);
//$res = array_sum($no);
//echo "<pre>";
//print_r($res);

$s = array("darpan"=>"php","jayesh"=>"java","tushar"=>"android");
//$h = asort($s);
$g = implode($s, ",");
echo $g;

$no = array("0"=>"5","1"=>"10","2"=>"20","3"=>"50");
$ee = array_slice($no,1,3);
//$ee = sizeof($s);
print_r($ee);
 
// $h = ksort($s);
// //echo $m;
// foreach ($s as $key => $value) {

// 	echo "$key=$value <br>";

//}


?>