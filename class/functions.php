<?php

// Função para inserir um novo usuário na tabela "usuarios"
function inserirUsuario($nome, $sobrenome, $email, $senha, $nivel_acesso) {
    global $pdo;

    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, sobrenome, email, senha, nivel_acesso) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $sobrenome, $email, password_hash($senha, PASSWORD_DEFAULT), $nivel_acesso]);
}

// Função para atualizar os dados de um usuário na tabela "usuarios"
function atualizarUsuario($id, $nome, $sobrenome, $email, $senha, $nivel_acesso) {
    global $pdo;

    $stmt = $pdo->prepare("UPDATE usuarios SET nome = ?, sobrenome = ?, email = ?, senha = ?, nivel_acesso = ? WHERE id = ?");
    $stmt->execute([$nome, $sobrenome, $email, password_hash($senha, PASSWORD_DEFAULT), $nivel_acesso, $id]);
}

// Função para excluir um usuário da tabela "usuarios
function excluirUsuario($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);

}

// Função para buscar um usuário na tabela "usuarios" pelo email e senha
function buscarUsuarioPorEmailSenha($email, $senha) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        return $usuario;
    } else {
        return false;
    }
}

// Função para buscar todos os usuários na tabela "usuarios"
function buscarUsuarios() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $usuarios;
}

// Função para buscar um usuário na tabela "usuarios" pelo id
function buscarUsuarioPorId($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $usuario;
}    