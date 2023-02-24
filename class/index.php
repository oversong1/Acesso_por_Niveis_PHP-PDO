<?php
session_start();

require_once 'config.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$usuario = $_SESSION['usuario'];

// Verifica o nível de acesso do usuário
if ($usuario['nivel_acesso'] == 'normal') {
    $menu = '<li><a href="#">Menu 1</a></li>
             <li><a href="#">Menu 2</a></li>
             <li><a href="#">Menu 3</a></li>';
} else {
    $menu = '<li><a href="#">Menu 1</a></li>
             <li><a href="#">Menu 2</a></li>
             <li><a href="#">Menu 3</a></li>
             <li><a href="admin.php">Admin</a></li>';
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="../css/estiloIndex.css">
</head>
<body>
    <nav>
        <ul>
            <?php echo $menu; ?>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>
    <h1>Bem-vindo, <?php echo $usuario['nome'] . ' ' . $usuario['sobrenome']; ?>!</h1>
</body>
</html>
