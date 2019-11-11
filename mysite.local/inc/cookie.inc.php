<?php
$vizitCounter = 0;
$time = time();
if(isset($_COOKIE["vizitCounter"])) {
	$vizitCounter = $_COOKIE["vizitCounter"];
}
	++ $vizitCounter ;	
	$lastVizit = "";

	if(isset($_COOKIE['lastVizit'])) {
		$lastVizit = $_COOKIE['lastVizit'];
	}

		if(date("d-m-y", $_COOKIE['lastVizit']) != date("d-m-y")) 
		{
			setcookie("lastVizit", $time, time() + 3600, "/");
			setcookie("vizitCounter", $vizitCounter, time() + 3600, "/");
		}
	
?>