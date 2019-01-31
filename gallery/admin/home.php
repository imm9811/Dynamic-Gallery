
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
<?php

	//include 'includes/menu.php';

	$page=$_GET["page"];
	switch($page){
		case 'listado';
			include 'includes/listado.php';
			break;
		case 'autores':
			include 'includes/autores.php';
			break;
		case 'new':
			include 'includes/nuevaFoto.inc.php';
			break;
	}
?>

</body>
</html>
