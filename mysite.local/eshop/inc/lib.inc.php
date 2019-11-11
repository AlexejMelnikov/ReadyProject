<?php
	function clearStr($data) {

		include 'config.inc.php';
		$data = trim(strip_tags($data));
		return mysqli_real_escape_string($link, $data);
	}
	function clearInt($data) {
		$data = (int)$data;
		return abs($data);
	}

		function addItemToCatalog($author, $title, $pubyear, $price) {
			include 'config.inc.php';
			$sql = "insert into catalog (author, title, pubyear, price) values (?, ?, ?, ?)";
				// подготовка запроса к исполнению
			if(!$stmt = mysqli_prepare($link, $sql)) {
				return false;  //" Ошибка подготовки запроса"
			}
			// привязка параметров к запросу
			mysqli_stmt_bind_param($stmt,"ssii", $author, $title, $pubyear, $price);
			// выполнение запроса к БД
			mysqli_stmt_execute($stmt);
			// очищение соединения
			mysqli_stmt_close($stmt);
			// echo $stmt;
			return true;
		}

		function selectAllItems() {
			include 'config.inc.php';
			// строка выбора информации из таблицы кат-алог
			$sql = " select id, author, title, pubyear, price from catalog";
			// проверка пришла ли информация с сервера
			if(!$result = mysqli_query($link, $sql)) {
				return false;
			}

			$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
				// очистка результатов выборки данных
			mysqli_free_result($result);
			return $items;
		}

		function saveBasket() {
			global $basket;
			// base64_encode - кодируем данные в формат mime base64
			// генерируем пригодное для хранения представление 
			$basket['id'] = base64_encode(serialize($basket));
			// echo $basket;

			setcookie('basket', $basket['id'], 0x7FFFFFFF);
		}

		function basketInit() {
			global $basket, $count;

			if(!isset($_COOKIE['basket'])) {


				$basket = ["orderId" => uniqid()];
				saveBasket();
			} else {
				$basket = unserialize(base64_decode($_COOKIE['basket']));
				$count = count($basket) - 1;
				// return $basket;
			}

		}

		function add2basket($id) {
			global $basket;

			$quantity = 1;
			$basket[$id] = $quantity;
			saveBasket();	
		}

		function myBasket() {
			global $basket, $link;
				// вернуть ключи маасива заказов в переменную
			$goods = array_keys($basket);
			$orderId = array_shift($goods);
			if(!$goods)
				return false;
			$ids = implode(",", $goods);

			$sql = "select id, author, title, pubyear, price from catalog where id in ($ids)";

			if(!$result = mysqli_query($link, $sql))
				return false;
			$items = result2array($result);

			mysqli_free_result($result);

			return $items;
		}

		function result2array($data) {
			global $basket;

			$arr = [];

			while($row =mysqli_fetch_assoc($data))
			{
				$row['quantity'] = $basket[$row['id']];
				$arr[] = $row; 
			}			
			return $arr;
		}

		function deleteItemFromBasket($id) {
			global $basket;

				unset($basket[$id]);
			saveBasket();
			header('location: basket.php');
				
		}

		function saveOrder( $datetime) {
			global $link, $basket;

			$goods = myBasket();
			// инициализация подготовленного запоса 
			$stmt = mysqli_stmt_init($link);
			// команда записи в бд значений
			$sql = "insert into orders (title,
										author,
										pubyear,
										price,
										quantity,
										orderid,
										datetime)
										values (?,?,?,?,?,?,?)";
			// если запрос не был подготовлен вернуть ложь							
			if(!mysqli_stmt_prepare($stmt,$sql)) {
				echo("BAD!");
				return false;
			}
			$baskets = unserialize(base64_decode($_COOKIE['basket']));
			foreach($goods as $item) 
			{
				// привязать переменные к ключевым местам запроса "?"
				mysqli_stmt_bind_param($stmt, "ssiiisi",
										$item['title'],
										$item['author'],
										$item['pubyear'],
										$item['price'],
										$item['quantity'],
										$baskets['orderId'],
										$datetime);
				}
			if(!mysqli_stmt_execute($stmt))
				echo("BAD!");
			mysqli_stmt_close($stmt);
			setcookie("basket", $basket['orderid'],time() - 360000000 );
			return true;
		}
		function getOrders() {
			global $link;
			// если текстового файла нет вернуть ложь
			if(!is_file(ORDERS_LOG)) {
				return false;
			}
			/* Получаем в виде массива персональные данные пользователей из файла */
			$orders = file(ORDERS_LOG);
			 // Массив, который будет возвращен функцией  
			$allorders = [];
			foreach($orders as $order) {
				// list присваивает переменным значения из списка подобно массиву за одну операцию
				list($name, $email, $phone, $address, $orderId, $date) = explode("|", $order); 
				
				 /* Промежуточный массив для хранения информации о конкретном заказе */
				 $orderinfo = [];
				   /* Сохранение информацию о конкретном пользователе */ 
				   $orderinfo['name'] = $name;
				   $orderinfo['email'] =$email;
				   $orderinfo['phone'] = $phone;
				   $orderinfo['address'] = $address;
				   $orderinfo['orderId'] = $orderId;
				   $orderinfo['date'] = $date;

				    /* SQL-запрос на выборку из таблицы orders всех товаров для конкретного покупателя x*/ 
				    $sql = "select author, title, pubyear, price, quantity from orders where datetime = $date
				    ";
				      /* Получение результата выборки */
				      
				      if(!$result = mysqli_query($link, $sql)) {
							// echo "BAD1!";
							return false;
				      }
				      // выбирает все строки из результирующего набоьра и помешает их в массив
				     if(!$items = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
				     		echo "BAD2!";
				     }
				      // очистить память приложения
				      mysqli_free_result($result);
				      /* Сохранение результата в промежуточном массиве */ 
				      $orderinfo['goods'] = $items;
				       /* Добавление промежуточного массива в возвращаемый массив */ 
				      $allorders[] = $orderinfo;
				  }
				      return $allorders;  

			}
			