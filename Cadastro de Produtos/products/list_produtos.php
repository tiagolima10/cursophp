<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dos Produtos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php
    // Verificar se o produto foi deletado com sucesso
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "
        <div id='alert' style='color: white; background-color:green; max-width:25%;margin:auto; padding:5px; border-radius: 10px; text-align:center;'>
            Produto deletado com sucesso!
        </div>
    
        <script>
            var alertBox = document.getElementById('alert');
            alertBox.classList.add('show');
            setTimeout(function() {
                alertBox.style.display = 'none';
            }, 2000);
        </script>";
    }

    // Conectar ao banco de dados
    require '../includes/db_connect.php';

    try {
        // Consulta para buscar todos os produtos
        $sql = "SELECT * FROM products";
        $stmt = $pdo->query($sql);

        // Verifica se existem produtos
        if ($stmt->rowCount() > 0) {
            // Exibe os produtos
            echo "<h1>Lista dos Produtos</h1>";
            echo "<table border='1'>";
            echo "<tr><th>Nome</th><th>Descrição</th><th>Preço</th><th>Ações</th></tr>";
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                echo "<td>" . htmlspecialchars($row['descricao']) . "</td>";
                echo "<td>" . htmlspecialchars($row['preco']) . "</td>";
                echo "<td>
                        <a href='edit_produtos.php?id=" . $row['id'] . "' class=\"editar\">Editar</a> |
                        <a href='delete_produtos.php?id=" . $row['id'] . "' class=\"deletar\">Deletar</a>
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
