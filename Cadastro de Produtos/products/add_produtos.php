<?php include '../includes/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="../css/adicionar.css">
</head>
<body>
    <h1>Adicionar Produtos</h1>
    <form action="add_produtos.php" method="POST">
        <label for="nome">Nome do Produto: </label>
        <input type="text" name="nome" id="nome" required>

        <label for="descricao">Descrição: </label>
        <textarea name="descricao" id="descricao" required></textarea>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" step="0.01" min="0" required>

        <button type="submit">Adicionar</button>
    </form>

    <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $preco = number_format($_POST['preco'], 2, ",", ".");

            $sql = "INSERT INTO products (nome, descricao, preco) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nome, $descricao, $preco]);

            echo "Produto adicionado com sucesso";
        }
    ?>

    <a href="../index.php"><span>Voltar</span></a>
    <a href="../products/list_produtos.php"><span>Lista de Produtos</span></a>
</body>
</html>