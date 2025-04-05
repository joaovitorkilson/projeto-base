<?php

$tabela = 'users';
require_once "../../../connect.php";

$id = $_POST['id'];


$query = $pdo->query("SELECT * FROM $tabela where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$foto = $res[0]['picture'];

if($foto != "sem-foto.jpg"){
	@unlink('./images/perfil/'.$foto);
}

$query = $pdo->prepare("DELETE FROM $tabela WHERE id = :id");
$query->bindValue(':id', $id);
$query->execute();
echo 'Excluído com Sucesso'; 