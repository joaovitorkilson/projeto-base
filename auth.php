<?php

@session_start();

require_once "./connect.php";



$email = filter_input(INPUT_POST,"email", FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST,"password", FILTER_DEFAULT);
$passCrip = md5($password);

$query = $pdo->prepare("SELECT * FROM users WHERE email = :email AND pass_crip = :password");
$query->bindValue(":email", $email);
$query->bindValue(":password", $passCrip);
$query->execute();
$queryResult = $query->fetchAll(PDO::FETCH_ASSOC);
$lines = @count($queryResult);


if ($lines > 0) {

    if (!$queryResult[0]['active'] == 1) {
        echo "<script>window.alert('Seu acesso foi desativado!')</script>";
        echo "<script>window.location='index.php'</script>";
    }

    $_SESSION['userName'] = $queryResult[0]['name'];
    $_SESSION['userId'] = $queryResult[0]['id'];
    $_SESSION['userLevel'] = $queryResult[0]['level'];



    echo "<script>window.location='panel'</script>";

} else {
    echo "<script>window.alert('dados incorretos')</script>";
    echo "<script>window.location='index.php'</script>";

}