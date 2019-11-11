<?php if(is_file("log/log.txt")) {
	// $file = file()
	$f = file("log/log.txt");
	

	echo("<ul>");
	foreach( $f as $item => $value ) {
		echo("<li>".$item." ".$value."</li>");	
	}
	echo("</ul>");
}
?>