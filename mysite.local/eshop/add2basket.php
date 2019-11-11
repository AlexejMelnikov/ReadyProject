<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";

	echo($id);
	$id = $_GET['idc'];
	add2basket($id);
	/* print_r($basket); */
	echo "<a href='catalog.php'> В корзтну </a>";
	header('location: catalog.php');
