<?php 
    $host = 'localhost'; 
    $db = 'cadastro_produtos'; 
    $user = 'root'; 
    $pass = ''; 

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
        exit;
    }