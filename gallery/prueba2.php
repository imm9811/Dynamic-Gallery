
<?php

$pass='zz';
$passConfirm='zZ';
$passCod=password_hash($pass, PASSWORD_BCRYPT);
echo $passCod;


if(password_verify('zz','$2y$10$qOzkmI.zhPgxFpyG//j51.BP.yWU8StmSLfGBoLkNKLjrCVKJ6iG2')){
echo "entra";
}
else echo "nada";
echo "<br>";


if(strcmp($pass, $passConfirm) === 0){
    echo "no son lo mismo";
}

?>