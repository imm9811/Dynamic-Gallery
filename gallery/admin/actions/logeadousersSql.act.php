<?php

include dirname(dirname(dirname( __FILE__))).'/common/utiles.php';
include dirname(dirname(dirname( __FILE__))).'/common/config.php';
include dirname(dirname(dirname( __FILE__))).'/common/mysql.php';



// //recogemos valores de las variables a pasar para valida usuario
 $email_login=$_POST['email_user'];
 //$password =  md5 ( $_POST['password']);
 $pass = $_POST['password'];    
 $passHash = password_hash($pass, PASSWORD_BCRYPT);
 //password_verify($pass, $passHash) comprueba por seguridad que ha codificado bien, devuelve boolean
 
 $connection = Connect( $config['database']);


 //$sql  = "select * from authors where email = '".$email_login."' and password = '090ee7b7a512fe349c0d70cfc1c2f3b6'";
$sql="select * from authors where email='$email_login' and password=";
 //090ee7b7a512fe349c0d70cfc1c2f3b 	'$password'

 debug($sql);
//$sql='select * from authors where email=$email_user || username=$email_user and password=$password';
$rows = ExecuteQuery( $sql, $connection);
debug($rows);

Close( $connection);

if ( empty( $rows))
{
	echo "no hay usuario registrado";
  //header ( "location: ../error.php?error=1");
}
else
{
  session_start();
  $_SESSION['id'] = $rows[0]['id'];
  $_SESSION['email'] = $rows[0]['email'];
  $_SESSION['session_id'] = session_id();

  header ( "location: ../home.php?page=listado");
}
 ?>