<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php

	$page=$_GET["page"];
	switch($page){
		case 'login':
			include "includes/login.php";
			break;
		case 'registro':
			include "includes/registro.php";
			break;
		case 'home':
			include "../index.php";
			break;
		
	}
?>
</body>
</html>