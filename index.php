<?php include ('db_connection.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>To_Do_List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1> Minha To Do List </h1>
    <form action="add_tash.php" method="POST">
        <input type="text" name="title" placeholder="Nova tarefa..." required>
        <button type="submit"> Adicionar </button>
    </form>
    <hr>
    <ul>
        <?php
        $sql = "SELECT * FROM tasks ORDER BY id DESC";
        $result = $conn->query(query: $sql);

        if ($result->num_rows > 0){
            while ($rows = $result->fetch_assoc()){
                echo "<li>";
                echo $row ['status'] == 'concluida' ? "<s>{$row['id']}</s>" : $row['title'];
                echo "
                <a href='update_task.php?id={$row['id']}'>V</a>
                <a href='delete_task.php?id={$row['id']}'>L</a>";
                echo "</li>";

            }
        }else{
            echo "<p> Nenhuma tarefa cadastrada.</p>";
        }
        ?>
    </ul>
</body>
</html>