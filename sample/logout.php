<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("dmz.ini","dbServer");

$request = array();
$request['type'] = "logout";
$request['uid'] = $_POST["uid"];
$response = $client->send_request($request);

sessionStorage.clear();

echo '<script type="text/javascript">		
window.location.replace("home.php");
</script>';

echo "client received response: ".PHP_EOL;
print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;


?>
