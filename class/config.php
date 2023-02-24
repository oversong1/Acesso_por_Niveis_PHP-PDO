<?php

// Informações de conexão com o banco de dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'shop');
define('DB_USER', 'root');
define('DB_PASS', '');

// Conexão com o banco de dados usando PDO
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}
