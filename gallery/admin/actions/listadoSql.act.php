<?php

include dirname( dirname( dirname( __FILE__))) . "/common/utiles.php";
include dirname( dirname( dirname( __FILE__))) . "/common/config.php";
include dirname( dirname( dirname( __FILE__))) . "/common/mysql.php";
  # conectamos con la base de datos

  $connection = Connect( $config['database']);

$sql="select a.*, b.name as tutor from images as a left join authors as b On a.author_id=b.id order by a.id asc";
//$sql="select a.*, b.name from authors a, imagen b where b.author_id = a.id order by a.id asc";


$rows = ExecuteQuery( $sql, $connection);
//debug($rows);




Close( $connection);
?>