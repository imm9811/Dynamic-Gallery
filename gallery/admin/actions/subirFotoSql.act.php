<?php

include dirname( dirname( dirname( __FILE__))) . "/common/utiles.php";
include dirname( dirname( dirname( __FILE__))) . "/common/config.php";
include dirname( dirname( dirname( __FILE__))) . "/common/mysql.php";
  # conectamos con la base de datos
  $connection = Connect( $config['database']);
 //debug($_POST);
 // debug($_FILES);

$author_id=$_POST['id_author'];
$name=$_POST['name'];
$texto=$_POST['text'];


move_uploaded_file($_FILES['file']["tmp_name"],"../../images/".$_FILES["file"]["name"]);

$fichero=$_FILES["file"]["name"];
$size=$_FILES["file"]["size"];

$sql="insert into images(author_id,name,file,size,text) values('$author_id','$name','$fichero','$size','$texto')";
$return = Execute( $sql, $connection);

Close( $connection);
header( "location: ../home.php?page=listado");

//header("location: ../index.php");
?> 