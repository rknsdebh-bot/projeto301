<?php
include('db_connection.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id = $_POST ['id'];
    $title = $_POST['title'];
    $sql = "UPDATE tasks SET title='$title' WHERE id = $id";
    if($conn -> query ($sql)===TRUE ){
        header("location: index.php");
        exit;
    }
    else{
        echo "Erro ao atualizar:".$conn -> error;
    }
}
$conn -> close();
?>