<?php

//definir fuso horário
date_default_timezone_set("America/Sao_Paulo");

// dados conexão bd local
$server = 'localhost';
$db_name = 'projeto_login';
$db_user = 'root';
$password = '';
try {
    $pdo = new PDO("mysql:dbname=$db_name;host=$server;charset=utf8", $db_user, $password);


} catch (Exception $e) {
    echo 'Erro ao conectar ao banco de dados!<br>' . $e;
    echo "<br>";
}

// variaveis globais
$sistemName = 'Nome Sistema';
$sistemEmail = 'contato@gmail.com';
$sistemNumber = '(32)999318584';