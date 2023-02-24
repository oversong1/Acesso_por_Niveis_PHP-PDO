<?php
session_start();

require_once 'config.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nivel_acesso = $_POST['nivel_acesso'];

    inserirUsuario($nome,$sobrenome, $email, $senha, $nivel_acesso);
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/estiloCadastro.css">
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <form method="post">
        <label>Nome:</label>
        <input type="text" name="nome" required>
        <label>Sobrenome:</label>
        <input type="text" name="sobrenome" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Senha:</label>
        <input type="password" name="senha" required>
        <label>Nível de Acesso:</label>
        <select name="nivel_acesso">
            <option value="normal">Normal</option>
            <option value="admin">Admin</option>
        </select>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
