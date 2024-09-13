<?php 
    // Conexão com o Banco
    require '../includes/db_connect.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        try {
            // Deletar pelo ID
            $sql = "DELETE FROM products WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);

            if ($stmt->rowCount()) {
                // Redirecionar para o Listar
                header("Location: list_produtos.php?success=1");
                exit();
            } else {
                echo "Produto não encontrado.";
            }
        } catch (PDOException $e) {
            echo "Erro: ". $e->getMessage();
        }
    } else {
        // Se não achar o ID
        echo "ID inválido";
    }