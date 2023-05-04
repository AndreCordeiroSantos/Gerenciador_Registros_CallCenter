<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location: login.html');
}
$logado = $_SESSION['login'];
// Conecta ao banco de dados
$db = new mysqli('172.10.20.47', 'archer', 'B5n3Qz2vL7HAUs7z', 'archerx');

// Obtém o ID do usuário a partir da solicitação
$userId = $_GET['userId'];

// Prepara a consulta SQL
$stmt = $db->prepare('SELECT id, nome, login, senha, tipo FROM usuarios_wyntech WHERE id = ?');
$stmt->bind_param('i', $userId);

// Executa a consulta
$stmt->execute();

// Obtém o resultado da consulta
$result = $stmt->get_result();

// Envia o resultado como JSON
header('Content-Type: application/json');
echo json_encode($result->fetch_assoc());
?>