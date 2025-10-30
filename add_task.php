<?php
include ('db_connection.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST['title'];
    $sql= "INSERT INTO tasks (title, status, created_at) VALUES ('$title', 'pendente', NOW())";
    if ($conn -> query (query:$sql)===TRUE){
        header("Location: index.php");
        exit; } else {
            echo "Error: ".$conn -> error;
        }
}
$conn -> closer(); ?>
