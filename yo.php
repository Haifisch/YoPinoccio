<?php
ini_set('display_errors',1);  
error_reporting(E_ALL);

// Define me!
$yotoken = "";
$troop = 1;
$scout = 1;
$username = "hello@pinocc.io";
$password = "ba978687678";


if(!empty($_GET['username'])){ 
	require("pinoccio.php");
	$api = new \pinoccio\Pinoccio();
	$api->login($username,$password);

	$ledReport = $api->rest("get","/v1/{$troop}/{$scout}/command/print%20led.isoff");

	print_r($ledReport["data"]["output"]);
	if ($ledReport["data"]["output"] == 1) {
		$ledON = $api->rest("get","/v1/{$troop}/{$scout}/command/led.on");
	}else {
		$ledOFF = $api->rest("get","/v1/{$troop}/{$scout}/command/led.off");
	}
	if (isset($ledReport['error'])) {
		$url = 'https://api.justyo.co/yo/';
		$data = array('api_token' => $yotoken, 'username' => $_GET['username']);

		$options = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'POST',
		        'content' => http_build_query($data),
		    ),
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);

		var_dump($result);
	}

	
}
?>