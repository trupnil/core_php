<?php 

$ketul = array('ketul','joshi');
 //echo $ketul;
// print_r($ketul);

$a = array("username" =>'ketul',"password"=>'123');
//print_r($a);

$b = array("gujarat"=>array('vadodara','surat'),"rajasthan" =>array('jaipur','udaipur'));
// echo "<pre>";
// print_r($b);
// echo "</pre>";

$animal = array("a"=>"tiger","b"=>"lion");
$fruite = array("apple","mango");
$mix = array_combine($animal,$fruite);
//print_r($mix);

$no = array("rajasthan","udaipur");
//print_r(array_count_values($no));

$php = array("php"=>"wordpress","java"=>"android");
$php2 = array("ioc"=>"android","php"=>"mvc");
//print_r(array_diff($php2, $php)); 

//print_r(array_search('wordpress',$php));


$product = array("0"=>"5","1"=>"10");
//print_r(array_sum($product));

$ab = array(0=>"tiger",1=>"lion",2=>"dipado",3=>"chitto");
// (array_unshift($ab,"Horse","dog"));
// print_r($ab);
$p = array("gujarat"=>"vadodara","mh"=>"mumbai");

//print_r(array_walk_recursive($p,"ad"));

$info = array("a"=>"coffee","brown");
 //list($n[0],$n[1]) = $info;
//var_dump($n);

$info1 = array("a"=>"coffee","b"=>"dfhfd");
//print_r(array_keys($info1))

$input = array(12,10,11);
$res= array_pad($input,5,52);
//print_r($res);
$g = array("username","password","city");
$rand = array_rand($g,2);
//print_r($rand[0]);  echo "<br>";
//print_r($rand[1]);
//echo $g[$rand[0]];
//print_r($g);







?>