<?php
include('db_connection.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = $id";
    $result = $conn -> query ($sql);
    if($result -> num_rows == 1){
        $tasks = $result -> fetch_assoc();
}
else{
    echo "Tarefa não informada";
    exit;
}}
else{
    echo "ID datarefa não informada.";
    exit;
}
?>

<!DOCTYPE html>
<html lang = "pt-br">
    <head>
        <meta charset = "UTF-8">
        <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <h1>Editor de Tarefa</h1>
            <form action="update_task_name.php"
            method="POST">
            <input type="hidden" name="id" value="<?php 
            echo $tasks ['id'];?>">
            <input type="text" name="title" value="<?php htmlspecialchars($tasks['title']); ?>" required>
            <button type="submit">Salvar alteração</button>
            </form>
            <br>
            <a href="index.php"> <- Voltar> </a>
        </body>
</html>