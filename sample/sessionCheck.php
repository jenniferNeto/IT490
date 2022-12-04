#!/usr/bin/php
<?php
require('lib/path.inc');
require('lib/get_host_info.inc');
require('lib/rabbitMQLib.inc');

//session_start();

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
$request['type'] = "validate_session";
$request['sessionid'] = $_POST["seshid"];

$response = $client->send_request($request);
echo "<script>
	sessionStorage.setItem('checkResponse',".$response.");
	</script>"


?>
