<?php 
    $id = $_GET['id'];

    $conn = new mysqli('localhost', 'root', '', 'todolist');

    if ($conn->connect_error) {
        die("Conexão falhou: $conn->connect_error");
    }

    // Alterna o status de "completed"
    $sql = "UPDATE tarefas SET completa = NOT completa WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Erro ao atualizar tarefa: $conn->error";
    }

    $conn->close();