<?php


//echo $_SERVER['PHP_SELF'];
echo $_SERVER['HTTP_HOST'];

if($_SERVER['PATH_INFO'] == '/jayesh')
{
	include("second.php");
}
?>