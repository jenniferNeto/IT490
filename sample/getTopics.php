#!/usr/bin/php
<?php
require_once('lib/path.inc');
require_once('lib/get_host_info.inc');
require_once('lib/rabbitMQLib.inc');

session_start();

$client = new rabbitMQClient("testRabbitMQ.ini","dbServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}

$request = array();
$request['type'] = "forumTopics";

$response = array();
$response = $client->send_request($request);
//form should be as follows:
//response[x][0]=topic poster username
//response[x][1]=timestamp of topic creation
//response[x][2]=title of topic
//the array returned to me can't have named keys like dictionary or else it doesn't count as an array
//
//$js_array = json_encode($response);
//echo "var topics = ". $js_array . ";\n";
?>

