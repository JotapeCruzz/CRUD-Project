<?php
session_start();
if((!isset($_SESSION['email']) == true ) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}
include "db_conn.php";

$id = $_GET['id'];
$sql = "DELETE FROM `itens` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if($result){
    header("Location: list.php?msg=Item removido com sucesso!");
}
else{
    echo "Falha: " . mysqli_error($conn);
}

?>