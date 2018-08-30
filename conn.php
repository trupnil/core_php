<?php

$localhost = "localhost";
$conn = new mysqli($localhost,"root","","20_april");

if($conn)
{
	echo "database sucessfull";
}
else
{
	echo "Error";
}


?>