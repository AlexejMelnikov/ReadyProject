<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Корзина пользователя</title>
</head>
<body>
	<h1>Ваша корзина</h1>
<?php
$number = 1;
if(!count($_COOKIE['basket']) > 0)
{
	die();
}
		$number = 1;
?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>N п/п</th>
	<th>Название</th>
	<th>Автор</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>Количество</th>
	<th>Удалить</th>
</tr>
<?php
	$summ = 0;
	$items = myBasket();
	print_r(unserialize(base64_decode($_COOKIE['basket'])));
	if(is_array($items))
	{
	foreach($items as $good => $value ) {
		$id = $value['id'];
		echo "<tr><td>".$number++."</td>".
				"<td>".$value['orderid']."</td>".
				"<td>".$value['title']."</td>".
				"<td>".$value['author']."</td>".
				"<td>".$value['pubyear']."</td>". 
				"<td>".$value['price']."</td>". 
				"<td>".$value['quantity']."</td>". 
				"<td>"."<a href = 'delete_from_basket.php?iddel=$id'> Удалить </a>"."</td></tr>"; 
		$summ += $value['price'];
		}	
			} else {
			echo "<a href = 'catalog.php'> Каталог </a>";		
		}
	
	
?>
</table>

<p>Всего товаров в корзине на сумму: <?= $summ ?> руб.</p>

<div align="center">
	<input type="button" value="Оформить заказ!"
                      onClick="location.href='orderform.php'" />
</div>

</body>
</html>







