





















			
				
				$arr[] = $row; 
				$basket = ["orderId" => uniqid()];
				$basket = unserialize(base64_decode($_COOKIE['basket']));
				$count = count($basket) - 1;
				$row['quantity'] = $basket[$row['id']];
				// вернуть ключи маасива заказов в переменную
				// очистка результатов выборки данных
				// подготовка запроса к исполнению
				list($name, $email, $phone, $address, $orderid, $date) = explode("|", $orders);
				return false;
				return false;
				return false;
				return false;
				return false;  //" Ошибка подготовки запроса"
				saveBasket();
			 array_shift($goods);
			$allorders =[];
			$arr = [];
			$basket = base64_encode(serialize($basket));
			$basket[$id] = $quantity;
			$goods = array_keys($basket);
			$ids = implode(",", $goods);
			$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$items = result2array($result);
			$orders = file(ORDERS_LOG);
			$quantity = 1;
			$sql = " select id, author, title, pubyear, price from catalog";
			$sql = "insert into catalog (author, title, pubyear, price) values (?, ?, ?, ?)";
			$sql = "select id, author, title, pubyear, price from catalog where id in ($ids)";
			/* Массив, который будет возвращен функцией */ 
			/* Получаем в виде массива персональные данные пользователей из файла */
			// base64_encode - кодируем данные в формат mime base64
			// echo $basket;
			// echo $stmt;
			// выполнение запроса к БД
			// генерируем пригодное для хранения представление 
			// очищение соединения
			// привязка параметров к запросу
			// проверка пришла ли информация с сервера
			// строка выбора информации из таблицы кат-алог
			eckb 
			foreach($orders as $order) {
			global $basket, $count;
			global $basket, $link;
			global $basket;
			global $basket;
			global $basket;
			global $basket;
			header('location: basket.php');	
			if(!$goods)
			if(!$result = mysqli_query($link, $sql))
			if(!$result = mysqli_query($link, $sql)) {
			if(!$stmt = mysqli_prepare($link, $sql)) {
			if(!is_file(ORDERS_LOG)) {
			if(!isset($_COOKIE['basket'])) {
			include 'config.inc.php';
			include 'config.inc.php';
			mysqli_free_result($result);
			mysqli_free_result($result);
			mysqli_stmt_bind_param($stmt,"ssii", $author, $title, $pubyear, $price);
			mysqli_stmt_close($stmt);
			mysqli_stmt_execute($stmt);
			return $arr;
			return $items;
			return $items;
			return true;
			saveBasket();
			saveBasket();	
			setcookie('basket', $basket, 0x7FFFFFFF);
			unset($basket[$id]);
			while($row =mysqli_fetch_assoc($data))
			{
			}
			}
			}
			}
			}
			}			
			} else {
		$data = (int)$data;
		$data = trim(strip_tags($data));
		function add2basket($id) {
		function addItemToCatalog($author, $title, $pubyear, $price) {
		function basketInit() {
		function deleteItemFromBasket($id) {
		function myBasket() {
		function result2array($data) {
		function saveBasket() {
		function saveOrder($datetime) {
		function selectAllItems() {
		include 'config.inc.php';
		return abs($data);
		return mysqli_real_escape_string($link, $data);
		}
		}
		}
		}
		}
		}
		}
		}
		}
	function clearInt($data) {
	function clearStr($data) {
	}
	}
<?php