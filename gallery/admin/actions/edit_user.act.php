<?php

include dirname(dirname(dirname( __FILE__))).'/common/utiles.php';
include dirname(dirname(dirname( __FILE__))).'/common/config.php';
include dirname(dirname(dirname( __FILE__))).'/common/mysql.php';
#conectamos con la bae de datos

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordRepe= $_POST['passwordRepe'];


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




if(!empty($password) and !empty($passwordRepe) ){
    if($passwordRepe==$password){
        $paswordCod=password_hash($password, PASSWORD_DEFAULT);
        if(password_verify($password,$paswordCod)){
            
            $sql = "update authors set name = '".$name."', email = '".$email."', password = '".$paswordCod."', enabled = ".$enabled." where id = " . $id;
        }
    }
}
else {
                
    $sql = "update authors set name = '".$name."', email = '".$email."', enabled = ".$enabled." where id = " . $id;
}



echo $sql;
$return = Execute( $sql, $connection);
debug($return);
Close( $connection);

header ( "location: ../home.php?page=autores.php");
?>