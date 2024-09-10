<?php
$id = $_GET['id'];

// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '', 'todolist');

// Verifica se a conexão foi bem sucedida
if ($conn->connect_error) {
    die("Conexão falhou: $conn->connect_error");
}

// Deleta a tarefa
$sql = "DELETE FROM tarefas WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Erro ao excluir tarefa: $conn->error";
}

$conn->close();
