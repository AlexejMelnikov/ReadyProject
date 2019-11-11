<?php
/* Основные настройки */
define(DB_HOST, "localhost");

define(DB_LOGIN, "root");

define(DB_PASSWORD, "");

define(DB_NAME, "gbook");

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);

		if(!$link) {
			echo(mysqli_connect_error);
		} else {
			// echo($_SERVER['HTTP_REFERER']);
		}
	$name = trim($_POST['name']);
	$name = htmlspecialchars($name);
	$name = mysqli_escape_string($link, $name);

	$email = trim($_POST['email']);
	$email = htmlspecialchars($email);
	$email = mysqli_escape_string($link, $email);


	$textArea = trim($_POST['msg']);
	$textArea = htmlspecialchars($textArea);
	$textArea = mysqli_escape_string($link, $textArea);

	$id = $_POST['id'];
	// $id = htmlspecialchars($textArea);
	// $id = mysqli_escape_string($link, $textArea);
	// echo($id);

	if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['msg']) and !isset($_POST['id'])) {
	// echo($_SERVER['HTTP_REFERER']);     and $_POST['submit']
	

	/* Сохранение записи в БД */
	$sqlInsert =  "insert into msgs (name, email, msg) values( '$name', '$email', '$textArea')" ;

	$result = mysqli_query($link, $sqlInsert);
}


// выбор информации из записей жуирала
	$sqlSelect = "select id, name, email,msg, datetime as dt from msgs order by dt desc";

	$result1 = mysqli_query($link, $sqlSelect);
	foreach($result1 as $item) {
		echo( "<p>".$item['id']."-".$item['name']."-".$item['email']."-".$item['msg']."</p>");
	}


/* Сохранение записи в БД */

/* Удаление записи из БД */
if(isset($_POST['id'])) {

	$sqlDelete =  "delete from msgs where id = '$id' " ;

	$result = mysqli_query($link, $sqlDelete);
}
/* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Delete: <br /><input type="id" name="id" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" value="Отправить!" />

</form>
<?php
/* Вывод записей из БД */

/* Вывод записей из БД */
?>