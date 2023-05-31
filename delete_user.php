<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location: login.html');
}
$logado = $_SESSION['login'];
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    if (isset($user_id)) {
        // Conexão com o banco de dados
        $conn = new mysqli('#', '#', '#', '#');
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }
        // Consulta SQL para excluir o usuário
        $sql = "DELETE FROM sua_tabela WHERE id = $user_id";
        if ($conn->query($sql) === TRUE) {
            header("location: usuarios.php");
        } else {
            echo "Erro ao excluir o usuário: " . $conn->error;
        }
        $conn->close();
    }
}
?>