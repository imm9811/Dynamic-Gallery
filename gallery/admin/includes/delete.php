<?php
include dirname(dirname(dirname( __FILE__))).'/common/utiles.php';
include dirname(dirname(dirname( __FILE__))).'/common/config.php';
include dirname(dirname(dirname( __FILE__))).'/common/mysql.php';

# conectamos con la base de datos
$connection = Connect( $config['database']);

$page=$_GET['page'];
if($page=="listado"){
$sql="Delete from images where id=".$_GET['id'];
}
else{
    $sql="Delete from authors where id=".$_GET['id'];
}
echo $sql;
$return = Execute($sql,$connection);

Close($connection);

echo "<h1>Borrado con exito</h1>";
header("location: ../home.php?page=$page");

?>