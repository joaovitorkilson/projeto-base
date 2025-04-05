<?php

require_once "./conect.php";

$query = $pdo->query("SELECT * FROM users");

$queryResult = $query->fetchAll(PDO::FETCH_ASSOC);
$lines = @count($queryResult);
$password = '123';
$passCrip = md5($password);

if ($lines == 0) {
    $pdo->query("INSERT INTO users SET name = '$sistemName', email = '$sistemEmail', pass = '$password', pass_crip = '$passCrip', level = 'Administrador', active = 'true', picture = 'sem-foto.jpg', cell_number = '$sistemNumber'");
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Base</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="login">
        <h1>Login</h1>
        <form class="form" method="POST" action="auth.php">
            <input type="text" name="email" id="email" placeholder="E-mail">
            <input type="text" name="password" id="password" placeholder="Senha">
            <button>Login</button>
        </form>
        </div>
    </section>
</body>

</html>