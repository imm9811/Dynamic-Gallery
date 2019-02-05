<?php

//nos devuelve la ruta en la que estamos, nos da el directorion y lo enlazamos a la raiz
//echo dirname( dirname(dirname(__FILE__))). "<br>";

include dirname(dirname(dirname( __FILE__))).'/common/utiles.php';
include dirname(dirname(dirname( __FILE__))).'/common/config.php';
include dirname(dirname(dirname( __FILE__))).'/common/mysql.php';

//debug($_POST);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LeaMosUAAAAALAMft_Hhh1t_0Ppuyrk0OI722uX',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch); 

        return json_decode($result, true);
	}
}

		// Call the function post_captcha
		$response=$_POST['g-recaptcha-response'];
		$res = post_captcha($response);
		
		if (!$res['success']) {
			// What happens when the reCAPTCHA is not properly set up
			echo 'reCAPTCHA error: Check to make sure your keys match the registered domain and are in the correct locations. You may also want to doublecheck your code for typos or syntax errors.';
		} else {
	$username= $_POST['username'];
	$email= $_POST['email'];
	//$password= md5($_POST['password']);
	//$confirm= md5($_POST['confirm']);
	
	$pass = $_POST['password'];    
	$passHash = password_hash($pass, PASSWORD_DEFAULT );

	$passConfirm = $_POST['confirm'];    
	$passHashConfirm = password_hash($passConfirm, PASSWORD_DEFAULT );
	//password_verify($pass, $passHash));


		if (isset( $_POST['enabled'])) {
			if ($pass==$passConfirm && password_verify($pass, $passHash) && password_verify($passConfirm, $passHashConfirm)) {
				$enabled=1;
				echo ("correcto");
			}
			
		}else
			{
				$enabled=0;
			}
	
	if( !isset($username) || !isset($email) || !isset($pass) || !isset($passConfirm) ){
		echo "no ha introducido ninguna valor";
		header("location:registro.php");
	}else
		{
		
	
		$connection=Connect($config['database']);
		$sql="insert into authors(name,email,password,enabled) values('".$username."','".$email."','".$passHash."',".$enabled.")";
		$return = Execute($sql,$connection);
		debug($return);
		Close($connection);
	
		echo "pasa";
		//header("location: /admin/index.php?page=login");
		header("location: /index.php");
	}
	

}//fin del condicional
?>