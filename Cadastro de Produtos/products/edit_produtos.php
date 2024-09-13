<?php
// Inclui a conexão com o banco de dados
require '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se os dados obrigatórios foram enviados
    if (isset($_POST['id'], $_POST['nome'], $_POST['descricao'], $_POST['preco'])) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];

        // Valida os dados (exemplo básico)
        if (empty($nome) || empty($descricao) || empty($preco) || !is_numeric($preco)) {
            echo "Por favor, preencha todos os campos corretamente.";
        } else {
            try {
                // Prepara a consulta para atualizar o produto
                $sql = "UPDATE products SET nome = :nome, descricao = :descricao, preco = :preco WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                
                // Associa os parâmetros
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':descricao', $descricao);
                $stmt->bindParam(':preco', $preco);
                $stmt->bindParam(':id', $id);

                // Executa a consulta
                if ($stmt->execute()) {
                    // Redireciona para a página de listagem com sucesso
                    header("Location: list_produtos.php?edit_success=1");
                    exit;
                } else {
                    echo "Erro ao atualizar o produto.";
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
    } else {
        echo "Dados incompletos.";
    }
} else {
    echo "Método inválido.";
}
?>
