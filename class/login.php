<?php
session_start();

require_once 'config.php';

// Verifica se o usuário já está logado
if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

// Processa o formulário de login quando é submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do formulário de login
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta o banco de dados para obter o usuário com o email informado
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = :email');
    $stmt->execute([':email' => $email]);
    $usuario = $stmt->fetch();

    // Verifica se o usuário foi encontrado e se a senha está correta
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Armazena o usuário na sessão e redireciona para a página principal
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
        exit();
    } else {
        // Exibe uma mensagem de erro caso as credenciais estejam incorretas
        $erro = 'E-mail ou senha incorretos.';
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/estiloLogin.css">
</head>
<body>
    
    <?php if (isset($erro)): ?>
        <p><?php echo $erro; ?></p>
    <?php endif; ?>
    <form method="post">
    <h1>Login</h1>
        <label for="email">E-mail:</label><br>
        <input type="email" name="email" required><br>
        <label for="senha">Senha:</label><br>
        <input type="password" name="senha" required><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
