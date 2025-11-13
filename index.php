<?php include('db_connection.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>To_Do_List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Minha To Do List</h1>

    <form action="add_task.php" method="POST">
        <input type="text" name="title" placeholder="Nova tarefa..." required>
        <button type="submit">Adicionar</button>
    </form>
    <hr>

    <ul>
        <?php
        $sql = "SELECT * FROM tasks ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>";

                if ($row['status'] == 'concluida') {
                    echo "<s>{$row['title']}</s>";
                } else {
                    echo $row['title'];
                }

                echo " 
                    <a href='update_task.php?id={$row['id']}'>✔️</a>
                    <a href='edit_task.php?id={$row['id']}'>✏️</a>
                    <a href='delete_task.php?id={$row['id']}'>🗑️</a>
                ";

                echo "</li>";
            }
        } else {
            echo "<p>Nenhuma tarefa cadastrada.</p>";
        }
        ?>
    </ul>
</body>
</html>