<?php

	define(DB_HOST,"localhost");

	define(DB_LOGIN,"root");

	define(DB_PASWORD,"");

	define(DB_NAME,"eshop");

	define(ORDERS_LOG,"orders.log");
	// массив козины покупок
	$basket = [];
	// колличество покупок
	$count = 0;
		// первый параметр localhost можно незадавать, он подтянется из настроек по умолчанию
	if(!$link = mysqli_connect("", DB_LOGIN, DB_PASWORD, DB_NAME))
		echo "Ошибка подключения к базе данных ".mysqli_connect_error();
		
	print_r(basketInit());
	// print_r(ORDERS_LOG);