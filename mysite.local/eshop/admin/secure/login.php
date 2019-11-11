<?php
	require_once "secure.inc.php";
		$title = 'Авторизация';
		$login  = '';
		session_start();
		header("HTTP/1.0 401 Unauthorized");
		require_once "secure.inc.php";
		// если данныые полученны методом пост
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			// trim - удаляет пробелы или другие символы из начала и конца строки
			// strip_tags - удаляет PHP и HTML из строки
			$login = trim(strip_tags($_POST['login']));
			$pw = trim(strip_tags($_POST['pw']));
			$ref = trim(strip_tags($_GET['ref']));
			// если реф не пришел отправить реф
			if(!$ref)
				$ref ="/eshop/admin/";
				// если логин и пароль был введен
			if($login and $pw) {
				// выполнить функцию проверки наличия пользователя в списке
				if($result = userExists($login)){

					list($_, $hash) = explode(":", $result);
					// функция проверки хэша
					if(checkHash($pw, $hash)) {
						$_SESSION['admin'] = true;
						header("location: $ref");
						exit;
					}  else {
						$title = " НЕ ПРАВИЛЬНОЕ ИМЯ ПОЛЬЗОВАТЕЛЯ ИЛИ ПАРОЛЬ";
					}
				} else {
						$title = " НЕ ПРАВИЛЬНОЕ ИМЯ ПОЛЬЗОВАТЕЛЯ ИЛИ ПАРОЛЬ";
			}
		} else {
			$title = " ЗАПОЛНИТЕ ВСЕ ПОЛЯ ФОРМЫ";
		}
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Авторизация</title>
	<meta charset="utf-8">
</head>
<body>
	<h1><?= $title?></h1>
	<form action="<?= $_SERVER['REQUEST_URI']?>" method="post">
		<div>
			<label for="txtUser">Логин</label>
			<input id="txtUser" type="text" name="login" value="<?= $login?>" />
		</div>
		<div>
			<label for="txtString">Пароль</label>
			<input id="txtString" type="password" name="pw" />
		</div>
		<div>
			<button type="submit">Войти</button>
		</div>	
	</form>
	 <?php  
	 // $login = $_POST['login'];
	 // print_r((is_file(FILE_NAME)));
	 // var_dump(userExists($login)) ;
	 ?>  
</body>
</html>