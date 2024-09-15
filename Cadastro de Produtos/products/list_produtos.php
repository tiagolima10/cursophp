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
    // Conectar ao banco de dados
    require '../includes/db_connect.php';

    // Número de produtos por página
    $registros_por_pagina = 5;

    // Pega a página atual pela URL
    $pagina_atual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $offset = ($pagina_atual - 1) * $registros_por_pagina;

    // Filtros da pesquisa
    $filtro_nome = isset($_GET['nome']) ? $_GET['nome'] : '';
    $filtro_preco_min = isset($_GET['preco_min']) ? $_GET['preco_min'] : '';
    $filtro_preco_max = isset($_GET['preco_max']) ? $_GET['preco_max'] : '';

    // Consulta SQL com filtros
    $sql = "SELECT * FROM products WHERE 1=1";

        if (!empty($filtro_nome)) {
            $sql .= " AND nome LIKE :nome";
        }
        if (!empty($filtro_preco_min)) {
            $sql .= " AND preco >= :preco_min";
        }
        if (!empty($filtro_preco_max)) {
            $sql .= " AND preco <= :preco_max";
        }

    $sql .= " LIMIT :limite OFFSET :offset";
    
    $stmt = $pdo->prepare($sql);

        // Bind dos parâmetros dos filtros
        if (!empty($filtro_nome)) {
            $stmt->bindValue(':nome', '%' . $filtro_nome . '%');
        }
        if (!empty($filtro_preco_min)) {
            $stmt->bindValue(':preco_min', $filtro_preco_min);
        }
        if (!empty($filtro_preco_max)) {
            $stmt->bindValue(':preco_max', $filtro_preco_max);
        }
        $stmt->bindValue(':limite', $registros_por_pagina, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

    $stmt->execute();

    // Exibe os produtos
    echo "<h1>Lista dos Produtos</h1>";

    // Formulário de filtros
    echo "<form method='GET' style='display: flex; flex-wrap: wrap; justify-content: center; align-items: end; gap: 15px; margin-bottom: 20px;'>
        <div style='flex: 0;'>
            <label for='nome' style='display: block; font-weight: bold;'>Nome:</label>
            <input type='text' name='nome' value='" . htmlspecialchars($filtro_nome) . "' 
                   style='padding: 5px; width: 250px; border-radius: 5px; border: 1px solid #ccc;'>
        </div>
        
        <div style='flex: 0;'>
            <label for='preco_min' style='display: block; font-weight: bold;'>Preço mínimo:</label>
            <input type='number' name='preco_min' value='" . htmlspecialchars($filtro_preco_min) . "' 
                   style='padding: 5px; width: 120px; border-radius: 5px; border: 1px solid #ccc;'>
        </div>
        
        <div style='flex: 0;'>
            <label for='preco_max' style='display: block; font-weight: bold;'>Preço máximo:</label>
            <input type='number' name='preco_max' value='" . htmlspecialchars($filtro_preco_max) . "' 
                   style='padding: 5px; width: 120px; border-radius: 5px; border: 1px solid #ccc;'>
        </div>

        <div>
            <button type='submit' style='padding: 6px 15px; background-color: #747474; color: white; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;'>
                Filtrar
            </button>
        </div>
      </form>";

    echo "<table border='1'>
          <tr><th>Nome</th><th>Descrição</th><th>Preço</th><th>Ações</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($row['descricao']) . "</td>";
        echo "<td> R$ " . number_format($row['preco'], 2, ',', '.') . "</td>";
        echo "<td>
                <a href='#' class='editar' data-id='" . $row['id'] . "'>Editar</a> |
                <a href='#' class='deletar' data-id='" . $row['id'] . "'>Deletar</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";

    // Paginação - calcular o total de produtos para determinar o número de páginas
    $stmt_count = $pdo->query("SELECT COUNT(*) FROM products");
    $total_registros = $stmt_count->fetchColumn();
    $total_paginas = ceil($total_registros / $registros_por_pagina);

    // Links de paginação
    echo "<div>";
    for ($i = 1; $i <= $total_paginas; $i++) {
        $classe_ativa = ($i == $pagina_atual) ? "active" : ""; // Adiciona a classe 'active' na página atual
        echo "<a href='list_produtos.php?pagina=$i' class=\"paginas $classe_ativa\"> $i </a> ";
    }
    echo "</div>";
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
