<?php
$prueba='hola';

if (isset($prueba)==true){
	echo "tiene";
}


$pass='zz';
$pass2='Zz';

echo "<br>";
$passCod=password_hash($pass, PASSWORD_BCRYPT);
echo $passCod;
echo "<br>";
if(password_verify($pass2,$passCod)==true){
	echo "contraseña aceptada";
}
else echo "no ha introducido bien la contraseña";
echo "<br>";
$array=array("a", "b", "c", "d", "e");
print_r(array_slice($array,0));
$sacarB=array_slice($array, 1,1);


$letra='';

//poner un foreach para que me saque la contraseña de la base de datos y de lo que me salga pues cojo el valor y el paso un pasword verify que me devuela true y si me da true pues pasa a la siguiente pagina y se inicia la session_start()
foreach($array as $num){
	if($num=='b'){
		echo "ntr";
	}
	else echo "nada";
}


echo "<br>";
print_r(array_slice($array, 1,1));







?>