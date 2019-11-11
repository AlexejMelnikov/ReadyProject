<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";
	$id = clearInt($_GET['iddel']);
	
	echo "<p>".$id."</p>";
	deleteItemFromBasket($id);
	// header('location: http://mysite.local/eshop/catalog.php');