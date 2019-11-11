<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Каталог товаров</title>
</head>
<body>
<p>Товаров в <a href="basket.php">корзине</a>: <?= $count?></p>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>Название</th>
	<th>Автор</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>В корзину</th>
</tr>
<?php
		$dt = date('d-n-Y', time());
		print_r($dt);
		$items = selectAllItems();
		foreach($items as $book => $items) {
			$id = $items['id'];
			echo "<tr>"."<td>".$items['title']."</td>".
				 "<td>".$items['author']."</td>".
				 "<td>".$items['pubyear']."</td>".
				 "<td>".$items['price']."</td>".
				 "<td>"."<a href='add2basket.php?idc=$id'>В корзину</a>"."</td>"."</tr>";
		}
		
?>
</table>
</body>
</html>