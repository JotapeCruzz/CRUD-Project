<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DatabaseRegister";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn -> connect_errno){
    echo "Falha ao conectar: (" . $conn->connect_errno . ") " . $conn->connect_error;

}
// echo "Conexão feita com Sucesso!";

?>