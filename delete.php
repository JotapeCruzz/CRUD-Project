<?php
include "db_conn.php";

$id = $_GET['id'];
$sql = "DELETE FROM `itens` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if($result){
    header("Location: index.php?msg=Item removido com sucesso!");
}
else{
    echo "Falha: " . mysqli_error($conn);
}

?>