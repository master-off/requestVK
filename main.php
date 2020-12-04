<?php
include("function.php");

echo "
\033[01;31m REQUESTVK \033[0m
0) Токен
1) Комментарии
2) Стена
3) Сообщения
";

$action = readline("\033[01;31m > \033[0m");
if($action == "0"){
  echo "
  0) Добавить токен
  1) Обновить токен
  ";
  $act = readline("\033[01;31m token >  \033[0m ");
    if($act == "0"){
      $token = readline("Введите токен: ");
      echo token(0,$token);
    }
}
if($action == "1")
{
  $quantity = readline("Количество комментариев: ");
  $post = readline("Ссылка на пост: ");
  $sleep = readline("Задержка в секундах: ");
  $data = explode("wall",$post);
  $own = explode("_", $data[1]);
  $i = 0;
  while(true){
    $i++;
    if($i !== $quantity){
  sleep($sleep);
  $ii = rand(0, 6996);
  $result = request("wall.createComment", ["owner_id"=> $own[0], "post_id" => $own[1] ,"message" => $ii], file_get_contents("cfg.txt"));
  echo($i." - ".$result."\n");
    if($i == $quantity) die("True");
    }
  }
} 
elseif ($action == "2") 
{
  $quantity = readline("Количество постов: ");
  $post = readline("Текст поста: ");
  $sleep = readline("Задержка в секундах: ");
  $i = 0;
  
  while(true){
    $i++;
    if($i !== $quantity){
      sleep($sleep);
      $result = request("wall.post", ["owner_id"=> $own[0] ,"message" => $post],file_get_contents("cfg.txt"));
      echo($i." - ".$result."\n");
         if($i == $quantity) die("True");
    }
  }
} elseif($action == "3"){
  $peer_id = readline("ID: ");
  $quantity = readline("Количество сообщений: ");
  $post = readline("Текст: ");
  $sleep = readline("Задержка в секундах: ");
  $i = 0;
  
  while(true){
    $i++;
    if($i !== $quantity){
      sleep($sleep);
      $result = request("messages.send", ["peer_id"=> $peer_id, "random_id" =>0 ,"message" => $post], file_get_contents("cfg.txt"));
        echo($i." - ".$result."\n");
          if($i == $quantity) die("True");
     }
  }
}