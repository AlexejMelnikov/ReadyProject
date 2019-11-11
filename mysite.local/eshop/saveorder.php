<?php
	require "inc/lib.inc.php";
	require "inc/config.inc.php";
	global $basket;
	$orderId = unserialize(base64_decode($_COOKIE['basket']));
	$orderId = $orderId['orderId']; 
	$name = clearStr($_POST['name']);

	$email = clearStr($_POST['email']);

	$phone = $_POST['phone'];
	// print_r($phone);
	$address = $_POST['address'];
	
	$dt = time();
		
	$order = $name." | ".$email." | ".$phone." | ".$address." | ".$orderId." | ".$dt."\n";

	// fopen(ORDERS_LOG, a+);
	$file = fopen("admin"."\\".ORDERS_LOG, 'a');
	fputs($file, $order);
	
	saveOrder($dt);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Сохранение данных заказа</title>
</head>
<body>
	<p>Ваш заказ принят.</p>
	<p><a href="catalog.php">Вернуться в каталог товаров</a></p>
</body>
</html>