<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
    <h1>To-Do List PHP</h1>
    <form action="add_tarefa.php" method="post">
        <input type="text" name="tarefa" placeholder="Adicione uma nova tarefa" required>
        <button type="submit">Adicionar</button>
    </form>

    <ul>
        <?php
            // Conexão com o banco
            $conn = mysqli_connect('localhost','root','','todolist');

            // Caso haja uma falha na conexão
            if ($conn->connect_error) {
                die("Conexão falhou $conn->connect_error");
            }

            // Varre o banco e seleciona todas as tarefas
            $sql = "SELECT * FROM tarefas";
            $result = $conn->query($sql);

            // Se houver tarefas, roda o loop
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $checked = $row['completa'] ? 'checked' : '';
                    echo "<li>
                            <input type='checkbox' onclick='toggleComplete({$row['id']})' $checked>
                            {$row['tarefa']}
                            <a href='delete_tarefa.php?id={$row['id']}' class='delete'>Excluir</a>
                        </li>";
                }
            } else {
                echo "<li>Nenhuma tarefa encontrada</li>";
            }

            //  Fecha a conexão com o banco
            $conn->close();
        ?>
    </ul>

    <script>
        function toggleComplete(id) {
            window.location.href = `toggle_complete.php?id=${id}`;
        }
    </script>
</body>
</html>