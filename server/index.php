<?php  
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App();

$app->get('/', function(Request $req, Response $res){

	$file = 'cnt';
	$current = file_get_contents($file);
	if (trim($current) == true) {
		$current = $current+1;
		file_put_contents($file, $current, LOCK_EX);
		$penumpang = $_SERVER['REMOTE_ADDR'];
		if (strcmp($penumpang, "152.118.33.94") == 0) {
			$penumpang = " Edwin (" . $_SERVER['REMOTE_ADDR'] . ")";
		}
		else{
			$penumpang = " Anonymous (" . $_SERVER['REMOTE_ADDR'] . ")";
		}
		$res->getBody()->write("IP: 152.118.33.94 <br/> Pemilik: Edwin Aditya Rahman <br/> Penumpang:". $penumpang . "<br/> CNT: " . $current);	
	}
});

$app->run();

 ?>
