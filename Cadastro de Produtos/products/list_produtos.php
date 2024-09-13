<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php
    // Conectar ao banco de dados
    require '../includes/db_connect.php';

    try {
        // Consulta para buscar todos os produtos
        $sql = "SELECT * FROM products";
        $stmt = $pdo->query($sql);

        // Verifica se existem produtos
        if ($stmt->rowCount() > 0) {
            // Exibe os produtos
            echo "<h1>Lista de Produtos</h1>";
            echo "<table border='1'>";
            echo "<tr><th>Nome</th><th>Descrição</th><th>Preço</th><th>Ações</th></tr>";
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                // echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                echo "<td>" . htmlspecialchars($row['descricao']) . "</td>";
                echo "<td>" . htmlspecialchars($row['preco']) . "</td>";
                echo "<td>
                        <a href='editar_produto.php?id=" . $row['id'] . "' class=\"editar\">Editar</a> |
                        <a href='deletar_produto.php?id=" . $row['id'] . "' class=\"deletar\">Deletar</a>
                    </td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>Nenhum produto cadastrado ainda.</p>";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
?>

    <a href="../index.php"><span>Voltar</span></a>
</body>
</html>
