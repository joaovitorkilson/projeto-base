<?php

$tabela = 'users';
require_once "../../../connect.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$nivel = $_POST['nivel'];
$endereco = $_POST['endereco'];
$senha = '123';
$senha_crip = md5($senha);
$id = $_POST['id'];


// validação email
$query = $pdo->query("SELECT * FROM $tabela WHERE email = '$email'");
$queryResult = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$queryResult[0]['id'];
if (@count($queryResult) > 0 and $id != $id_reg) {
    echo 'Email já cadastrado';
    exit();
}



// validação telefone
$query = $pdo->query("SELECT * FROM $tabela WHERE cell_number = '$telefone'");
$queryResult = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$queryResult[0]['id'];
if (@count($queryResult) > 0 and $id != $id_reg) {
    echo 'Telefone já cadastrado';
    exit();
}

if ($id == "") {
    $query = $pdo->prepare("INSERT INTO $tabela SET name = :nome, email = :email, pass = '$senha', pass_crip = '$senha_crip', level = '$nivel', active = 1, picture = 'sem-foto.jpg', cell_number = :telefone, date = curDate(), address = :endereco");
} else {
    $query = $pdo->prepare("UPDATE $tabela SET name = :nome, email = :email, level = '$nivel', cell_number = :telefone, address = :endereco WHERE id = '$id'");

}

$query->bindValue(":nome", $nome);
$query->bindValue(":email", $email);
$query->bindValue(":telefone", $telefone);
$query->bindValue(":endereco", $endereco);
$query->execute();

echo 'Salvo com Sucesso';