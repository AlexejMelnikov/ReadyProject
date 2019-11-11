<?php
	require "secure/session.inc.php";
	require "../inc/lib.inc.php";
	require "../inc/config.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Поступившие заказы</title>
	<meta charset="utf-8">
</head>
<body>
<h1>Поступившие заказы:</h1>
<?php
	$orders = getOrders();
 	$number = 1;
foreach($orders as $order => $data)
	{
		echo "<hr><h2>Заказ номер:".$data['orderId']."</h2>".
		"<p><b>Заказчик</b>:".$data['name']."</p>".
		"<p><b>Email</b>:".$data['email']."</p>".
		"<p><b>Телефон</b>:".$data['phone']."</p>".
		"<p><b>Адрес доставки</b>:".$data['orderid']."</p>".
		"<p><b>Дата размещения заказа</b>:".date('j-n-Y G:i',$data['date'])."</p>".
		"<h3>Купленные товары:</h3>".
		"<table border=1 cellpadding= 5 cellspacing= 0 width= 90%>
				<tr>
					<th>N п/п</th>
					<th>Название</th>
					<th>Автор</th>
					<th>Год издания</th>
					<th>Цена, руб.</th>
					<th>Количество</th>
				</tr>";
		
		
		$books = $data['goods'];
		// var_dump($books);
		// $i =0;
		// echo "<tr><td>".$number++."</td>";
		// while($i < count($data)) {
		// 	echo "<td>".$books[$i]."</td></tr";	
		// 	$i++;
		// }
		foreach( $books as $item){
		
		echo "<tr><td>".$number++."</td>".
		 "<td>".$item['title']."</td>".
		 "<td>".$item['author']."</td>".
		 "<td>".$item['pubyear']."</td>".
		 "<td>".$item['price']."</td>".
		 "<td>".$item['quantity']."</td></tr>";
			
	}
}	
	
 ?>


		


</table>
<p>Всего товаров в заказе на сумму: руб.</p>

</body>
</html>