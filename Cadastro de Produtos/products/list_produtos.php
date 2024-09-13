<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dos Produtos</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /* Estilos para o modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .close {
            color: red;
            cursor: pointer;
            font-weight: bold;
        }

        .modal button {
            margin: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .cancel {
            background-color: grey;
            color: white;
        }

        .confirm {
            background-color: red;
            color: white;
        }
    </style>
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

    <!-- Modal de confirmação -->
    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <p>Tem certeza que deseja excluir este produto?</p>
            <button class="cancel">Cancelar</button>
            <button class="confirm">Excluir</button>
        </div>
    </div>

    <script>
        // Abrir o modal ao clicar em deletar
        const deleteLinks = document.querySelectorAll('.deletar');
        const modal = document.getElementById('confirmModal');
        const cancelBtn = document.querySelector('.cancel');
        const confirmBtn = document.querySelector('.confirm');
        let productId = null;

        deleteLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                productId = this.getAttribute('data-id');
                modal.style.display = 'flex';
            });
        });

        cancelBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        // Confirmar a exclusão
        confirmBtn.addEventListener('click', function() {
            window.location.href = `delete_produtos.php?id=${productId}`;
        });

        // Fechar o modal ao clicar fora da caixa
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };
    </script>
</body>
</html>
