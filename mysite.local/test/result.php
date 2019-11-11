<?php
$result = 0;

if(isset($_SESSION['test'])) {
	// зачитываем ответы из ini файла в массив
	$answers = parse_ini_file("answers.ini");
	
	foreach($_SESSION['test'] as $value) {
		if(array_key_exists($value, $answers))

			$result +=(int)$answers[$value];
		}
		session_destroy();
	}
?>
<table width="100%">
	<tr>
		<td align="left">
		<p> ваш резулитат <?= $result ?></p>
		</td>
	</tr>
</table>