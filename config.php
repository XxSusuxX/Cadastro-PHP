<?php
$servername = "127.0.0.1:3308";
$username = "root";
$password = "";
$database = "formulario-cadastro";


// Criar a conexão
$conn = new mysqli($servername, $username, $password, $database);
if($conn->connect_errno){
    echo "Falha ao se conectar: (" . $conn->connect_errno . ") " . $conn->connect_error;
}

?>
