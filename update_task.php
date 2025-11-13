<?php
include('db_connection.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "UPDATE tasks SET status = IF (status = 'pendente','concluida','pendente')WHERE id = $id";
$conn->query($sql);}
header(header: "Location: index.php");
exit;
?>