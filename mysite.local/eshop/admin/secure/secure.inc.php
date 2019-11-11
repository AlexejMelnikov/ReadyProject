<?php
define(FILE_NAME, ".htpasswd");

//  функция генерирует хэш
		function getHash($password) {
			 // создает хеш пароля используя сильный, необратимый алгоритм хеширования
			$hash = password_hash($password, PASSWORD_BCRYPT);
			return $hash;
		}
		// проверка хэша
 		function checkHash($password, $hash) {
 			// проверяет соответстветствует хэш паролю 
 			return password_verify($password, $hash);
 		}
 		// записьывет пользователя в файл .httpaswd
 		function saveUser($login, $hash) {
 			$str = "$login:$hash\n";
    		// записывает данные $str в FILE_NAME
 			if(file_put_contents(FILE_NAME, $str, FILE_APPEND)) 
 			{
 				return true;
 			}
 			else {
 				return false;
 			}
 		}
 		// проверка наличия пользлвателя в списке
 		function userExists($login) {
 			// проверка является ли файл обычным файлом
			if(!is_file(FILE_NAME))
				return false;
			// считаем весь файл FILE_NAME в массив
			$users = file(FILE_NAME);
			
			foreach($users as $user) {
			// возвращает позицию первого вхождения подстроки, еслин ет вурнет фолс 
			if(strpos($user, $login.":" )!== false) 
				return trim($user);
				} 
				return false;
 		}
 		// завершение сеанса пользователя
 		function logOut() {
 			session_destroy();
 			header("location: secure/login.php");
 			exit;
 		}
