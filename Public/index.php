<?php
header('Content-Type: application/json charset=utf-8');

require_once "../vendor/autoload.php";

if($_GET['url'])
{

	$url = filter_input(INPUT_GET,'url',FILTER_SANITIZE_STRING);
	$url = ltrim($url,'/');
	$url = explode('/',$url);
	$api = $url[0];

	if($api === 'api')
	{
		array_shift($url);

		if($url[0] != ''){
			$service = 'Api\Service\\'.ucfirst($url[0]).'Service';
		}else {
			$service = 'Api\Service\UserService';
		}

		array_shift($url);

		$parametro = array();
		$parametro = $url;

		$metodo = strtolower($_SERVER['REQUEST_METHOD']);

		try {
			$resposta = call_user_func_array(array(new $service, $metodo),$parametro);
			echo json_encode(array('status' => 'Sucesso', 'dados' => $resposta));
		} catch (\Exception $e) {
			echo json_encode(array('status' => 'Erro', 'dados' => $e->getMessage()),JSON_UNESCAPED_UNICODE);
		}
	}	
} else {
	echo json_encode(array('status' => 'Erro', 'dados' => 'Serviço não encontrado'),JSON_UNESCAPED_UNICODE);
}

?>