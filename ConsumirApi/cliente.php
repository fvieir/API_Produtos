<?php
require_once "../vendor/autoload.php";

/*$url = 'http://localhost/apiV2/Public/api/User/';
//$classe = '/user';
//$parametro = '';

$retorno = file_get_contents($url);

$template = file_get_contents('View/template.html');
$tpronto = str_replace('{{conteudo dinamico}}',$retorno,$template);

echo $tpronto;*/


$data = array();

$data_json = json_encode($data);

$url = 'http://localhost/apiV2/Public/api/User/7';

$curl = curl_init();

curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json' , 'Content-Length'.strlen($data_json)));
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,"DELETE");
curl_setopt($curl,CURLOPT_POSTFIELDS,$data_json);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

$reponse = curl_exec($curl);

curl_close($curl);

print_r($reponse);







