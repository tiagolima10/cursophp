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

    <form action="index.php" method="GET">
        <input type="text" name="search" placeholder="Pesquise por uma tarefa">
        <button type="submit">Pesquisar</button>
    </form>

    <form action="add_tarefa.php" method="post">
        <input type="text" name="tarefa" placeholder="Adicione uma nova tarefa" required>
        <button type="submit">Adicionar</button>
    </form>

    <!-- Filtro de Tarefas Completas/Incompletas -->
    <form action="index.php" method="GET">
        <select name="filter">
            <option value="all" <?= !isset($_GET['filter']) || $_GET['filter'] == 'all' ? 'selected' : '' ?>>Todas</option>
            <option value="complete" <?= isset($_GET['filter']) && $_GET['filter'] == 'complete' ? 'selected' : '' ?>>Completas</option>
            <option value="incomplete" <?= isset($_GET['filter']) && $_GET['filter'] == 'incomplete' ? 'selected' : '' ?>>Incompletas</option>
        </select>
        <button type="submit">Filtrar</button>
    </form>

    <ul>
        <?php
            // Conexão com o banco de dados
            $conn = mysqli_connect('localhost', 'root', '', 'todolist');

            // Caso haja uma falha na conexão
            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            // Inicializa a consulta SQL
            $sql = "SELECT * FROM tarefas WHERE 1";

            // Filtragem por completas ou incompletas
            if (isset($_GET['filter'])) {
                if ($_GET['filter'] == 'complete') {
                    $sql .= " AND completa = 1";
                } elseif ($_GET['filter'] == 'incomplete') {
                    $sql .= " AND completa = 0";
                }
            }

            // Pesquisa por tarefa
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = $conn->real_escape_string($_GET['search']);
                $sql .= " AND tarefa LIKE '%$search%'";
            }

            // Executa a consulta SQL
            $result = $conn->query($sql);

            // Se houver tarefas, exibe-as
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

            // Fecha a conexão com o banco de dados
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