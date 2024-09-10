<?php
// Obtém o ID da tarefa
$id = $_GET['id'];

// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '', 'todolist');

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: $conn->connect_error");
}

// Busca o estado atual da tarefa
$sql = "SELECT completa FROM tarefas WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $completa = $row['completa'] ? 0 : 1; // Alterna o status de completa/incompleta

    // Atualiza o status da tarefa no banco de dados
    $sql = "UPDATE tarefas SET completa = $completa WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php'); // Redireciona de volta para a página principal
    } else {
        echo "Erro ao atualizar a tarefa: $conn->error";
    }
} else {
    echo "Tarefa não encontrada.";
}

$conn->close();
