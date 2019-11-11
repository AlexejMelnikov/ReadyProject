<?php 
	// define()
	$dt = time();
	 // URI, который был предоставлен для доступа к этой странице
	$page = $_SERVER['REQUEST_URI'];
	// адрес страницы с которой пользователь перешел на эту
	$ref = $_SERVER['HTTP_REFERER'];

	$path = "\n".date("j-M-Y H:m:s",$dt)." | ".$page." | ".$ref."\n";
	$file = fopen("log/".PATH_LOG, 'a');
	fputs($file, $path);
	fclose($file);
	// file_put_contents("log/".PATH_LOG, $path);
	// print_r($path);
	
 ?>
