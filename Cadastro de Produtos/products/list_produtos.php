<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dos Produtos</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/list.css">
</head>
<body>

<?php
    // Verificar se o produto foi deletado ou editado com sucesso
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "
        <div id='alert' style='color: white; background-color:green; max-width:25%;margin:auto; padding:5px; border-radius: 10px; text-align:center;'>
            Produto deletado com sucesso!
        </div>";
    } elseif (isset($_GET['edit_success']) && $_GET['edit_success'] == 1) {
        echo "
        <div id='alert' style='color: white; background-color:green; max-width:25%;margin:auto; padding:5px; border-radius: 10px; text-align:center;'>
            Produto editado com sucesso!
        </div>";
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
                echo "<td> R$ " . number_format($row['preco'], 2, ',', '.') . "</td>";
                echo "<td>
                        <a href='#' class=\"editar\" data-id=\"" . $row['id'] . "\" data-nome=\"" . htmlspecialchars($row['nome']) . "\" data-descricao=\"" . htmlspecialchars($row['descricao']) . "\" data-preco=\"" . $row['preco'] . "\">Editar</a> |
                        <a href='#' class=\"deletar\" data-id=\"" . $row['id'] . "\">Deletar</a>
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

    <!-- Modal de confirmação de exclusão -->
    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <p class="confirmacao">Tem certeza que deseja excluir este produto?</p>
            <button class="cancel">Cancelar</button>
            <button class="confirm">Excluir</button>
        </div>
    </div>

    <!-- Modal de edição de produtos -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <h2>Editar Produto</h2>
            <form id="editForm" action="edit_produtos.php" method="POST">
                <input type="hidden" name="id" id="editId">
                <label for="editNome">Nome do Produto:</label>
                <input type="text" name="nome" id="editNome" required>
                
                <label for="editDescricao">Descrição:</label>
                <textarea name="descricao" id="editDescricao" required></textarea>
                
                <label for="editPreco">Preço:</label>
                <input type="number" name="preco" id="editPreco" step="0.01" required>
                
                <button type="submit" class="confirm">Salvar</button>
                <button type="button" class="cancel">Cancelar</button>
            </form>
        </div>
    </div>

    <script>
        // Modal de exclusão
        const deleteLinks = document.querySelectorAll('.deletar');
        const confirmModal = document.getElementById('confirmModal');
        const cancelBtn = document.querySelectorAll('.cancel');
        const confirmBtn = document.querySelector('.confirm');
        let productId = null;

        deleteLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                productId = this.getAttribute('data-id');
                confirmModal.style.display = 'flex';
            });
        });

        cancelBtn.forEach(button => {
            button.addEventListener('click', function() {
                confirmModal.style.display = 'none';
                editModal.style.display = 'none';
            });
        });

        confirmBtn.addEventListener('click', function() {
            window.location.href = `delete_produtos.php?id=${productId}`;
        });

        // Modal de edição
        const editLinks = document.querySelectorAll('.editar');
        const editModal = document.getElementById('editModal');
        const editForm = document.getElementById('editForm');

        editLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const id = this.getAttribute('data-id');
                const nome = this.getAttribute('data-nome');
                const descricao = this.getAttribute('data-descricao');
                const preco = this.getAttribute('data-preco');

                document.getElementById('editId').value = id;
                document.getElementById('editNome').value = nome;
                document.getElementById('editDescricao').value = descricao;
                document.getElementById('editPreco').value = preco;

                editModal.style.display = 'flex';
            });
        });

        // Fechar modais ao clicar fora da caixa
        window.onclick = function(event) {
            if (event.target == confirmModal) {
                confirmModal.style.display = 'none';
            }
            if (event.target == editModal) {
                editModal.style.display = 'none';
            }
        };
    </script>
</body>
</html>
