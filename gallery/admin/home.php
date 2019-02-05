
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Menu</title>
</head>
<body>
	
<?php

	include 'includes/menu.php';

	$page=$_GET["page"];
	switch($page){
		case 'listado';
			include 'actions/listadoSql.act.php';
			include 'includes/listado.php';
			break;
		case 'autores':
			include 'includes/autores.php';
			break;
		case 'new':
			include 'includes/nuevaFoto.inc.php';
			break;
		case 'editarFoto':
			include 'includes/editarFoto.php';
			break;
			case 'editarUser':
			include 'includes/editarUser.php';
			break;
	}
?>

</body>
</html>
