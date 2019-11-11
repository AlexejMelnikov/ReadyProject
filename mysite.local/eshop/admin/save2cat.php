<?php
	// подключение библиотек
	require "secure/session.inc.php";
	require "../inc/lib.inc.php";
	require "../inc/config.inc.php";

	$author = clearStr($_POST['author']);	
	$title = clearStr($_POST['title']);	
	$pubyear = clearInt($_POST['pubyear']);
	$price = clearInt($_POST['price']);

	// echo $author;

	if(!addItemToCatalog($author, $title, $pubyear, $price))
		echo " Произошла ошибка добавления данных";
			else {
				header('location: add2cat.php');
			}