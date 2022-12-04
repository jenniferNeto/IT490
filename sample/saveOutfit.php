#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client = new rabbitMQClient("dmz.ini","dbServer");

$request = array();
$request['type'] = "createOutfit";
$request['outfitname'] = $_POST["oName"];
$request['uid'] = 1;
$request['top'] = $_POST["top"];
$request['bottom'] = $_POST["bottom"];
$response = $client->send_request($request);

header("Location: myOutfits.php");

echo "client received response: ".PHP_EOL;
print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;

?>