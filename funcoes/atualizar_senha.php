<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: login.html');
}

// Conexão com o banco de dados
$servername = "172.10.20.47";
$usernameDB = "archer";
$passwordDB = "B5n3Qz2vL7HAUs7z";
$dbname = "archerx";
$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter os dados da requisição
$id = $_POST['idUsuario'];
$novaSenha = $_POST['novaSenha'];

// Realizar a atualização da senha na tabela
$sql = "UPDATE usuarios_wyntech SET SENHA = '$novaSenha' WHERE ID = $id";
if ($conn->query($sql) === TRUE) {
    echo "success"; // Informar que a atualização foi bem-sucedida
} else {
    echo "error"; // Informar que ocorreu um erro na atualização
}

$conn->close();
