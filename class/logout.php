<?php
session_start();

// Remove o usuário da sessão
unset($_SESSION['usuario']);

// Redireciona para a página de login
header('Location: login.php');
exit();
?>
