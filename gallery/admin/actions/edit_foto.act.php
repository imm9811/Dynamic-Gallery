<?php


include dirname(dirname(dirname( __FILE__))).'/common/utiles.php';
include dirname(dirname(dirname( __FILE__))).'/common/config.php';
include dirname(dirname(dirname( __FILE__))).'/common/mysql.php';
#conectamos con la bae de datos

$id = $_POST['id'];
$author_id = $_POST['author_id'];
$name = $_POST['name'];
$text = $_POST['text'];

# conectamos con la base de datos
$connection = Connect( $config['database']);

if ( isset( $_POST['enabled']))
{
  $enabled = 1;
}
else
{
  $enabled = 0;
}

if ( $_FILES['fichero']['name'] != "")
{
  move_uploaded_file( $_FILES["fichero"]["tmp_name"], "../../images/" . $_FILES["fichero"]["name"]);

  $fichero = $_FILES["file"]["name"];
  $size = $_FILES["file"]["size"];

  $sql = "update images set author_id = ".$author_id.", name = '".$name."', text = '".$text."', file = '".$fichero."', 
    size = '".$size."', enabled = ".$enabled." where id = " . $id;
}
else
{
  $sql = "update images set author_id = ".$author_id.", name = '".$name."', text = '".$text."', enabled = ".$enabled." where id = " . $id;
}



$return = Execute( $sql, $connection);

Close( $connection);

header ( "location: ../home.php?page=listado");
?>