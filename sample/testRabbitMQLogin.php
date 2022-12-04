#!/usr/bin/php
<?php
//logging stuff
//require_once __DIR__.'/vendor/autoload.php';

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

session_start();

$email = $_POST["email"];
$user = $_POST["user"];
$pword = $_POST["pword"];
$error = 0;
$_SESSION['user'] = $user;

if(!isset($email)){
        echo "please fill email";
        $error = 1;
}
if(!isset($user)){
        echo "please fill user";
        $error = 1;
}
if(!isset($pword)){
        echo "please fill pasword";
        $error = 1;
}
if($error == 1){
        exit();
}

$salted = "7r6iu453we86lt7jhfdnbhdsbmxj,kmsnlx".$pword."Y*J^EJksdjcaskdjsjjwsksksdjdjhfdhjedeuu474";
$peppered = "wek;jfkeu2rhnfkwfwnflwp933iei348r".$salted."4uifhkejr cjhsdvxyyf347hbxjeh xru3";
$hashed = hash('sha512', $peppered);

$client = new rabbitMQClient("dmz.ini","dbServer");

$request = array();
$request['type'] = "login";
$request['email'] = $email;
$request['username'] = $user;
$request['password'] = $hashed;


$response = array();
$response = $client->send_request($request);
//$response = $client->publish($request);


if($response[0] == 1){	
	$_SESSION['sessionid'] = $response[1];
        $_SESSION['uid'] = $response[2];
	echo '<script type="text/javascript">		
	sessionStorage.setItem("id",', $response[1], ');
	sessionStorage.setItem("uid",'.$response[2].'); 
	window.location.replace("home.php");
	</script>';

}else{
	header("Location: login.html");
}
?>
