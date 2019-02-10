<?php

include dirname(dirname(dirname( __FILE__))).'/common/utiles.php';
include dirname(dirname(dirname( __FILE__))).'/common/config.php';
include dirname(dirname(dirname( __FILE__))).'/common/mysql.php';



// //recogemos valores de las variables a pasar para valida usuario
 $user_login=$_POST['email_user'];

 $pass = $_POST['password'];    

 //password_verify($pass, $passHash) comprueba por seguridad que ha codificado bien, devuelve boolean
 
 $connection = Connect( $config['database']);


 //$sql  = "select * from authors where email = '".$email_login."' and password = '090ee7b7a512fe349c0d70cfc1c2f3b6'";
//$sql="select password from authors where email='$user_login'";

echo "<br>";  
$sql="select password from authors where email='$user_login' || name='$user_login'";


$rows = ExecuteQuery( $sql, $connection);

$contraDevuelta=$rows[0][0];

Close( $connection);

if ( empty($rows))
{
	echo "no hay usuario registrado";
  //header ( "location: ../error.php?error=1");
}
elseif(password_verify($pass,$contraDevuelta)==true)
{
  //hace que laa cookie solo dure un dia
  session_start([
    'cookie_lifetime' => 86400,
    'read_and_close'  => true
]);
  $_SESSION['id'] = $rows[0]['id'];
  $_SESSION['email'] = $rows[0]['email'];
  $_SESSION['session_id'] = session_id();


  header ( "location: ../home.php?page=menu");
}
else{
  echo "error con la contraseña, repitala por favor...";
}
 ?>