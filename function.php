<?php
function request($method, $params, $token) {

		$result = file_get_contents('https://api.vk.com/method/'.$method.'?'.http_build_query($params).'&access_token='.$token.'&v=5.126');

		return $result; }

function token($act, $token){
  if($act == 0){
    $fp = fopen("cfg.txt","w");
    fwrite($fp, $token);
    fclose($fp);
    return "Токен добавлен";
  } 
}