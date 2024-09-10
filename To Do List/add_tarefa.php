<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tarefa = $_POST['tarefa'];

        // Conexão com o banco
        $conn = new mysqli('localhost', 'root', '', 'todolist');

        // Verifica se a conexão foi bem sucedida
        if ($conn->connect_error) {
            die("Conexão falhou: $conn->connect_error");
        }

        // Nova tarefa
        $sql = "INSERT INTO tarefas (tarefa) VALUES ('$tarefa')";

        if ($conn->query($sql) === TRUE) {
            header('Location: index.php');
        } else {
            echo "Erro ao adicionar tarefa: $conn->error";
        }

        $conn->close();
    }