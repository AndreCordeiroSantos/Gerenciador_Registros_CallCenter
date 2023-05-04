<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location: login.html');
}
$logado = $_SESSION['login'];

// conexão com o banco de dados
$conn = new mysqli('172.10.20.47', 'archer', 'B5n3Qz2vL7HAUs7z', 'archerx');

// verificação de erros na conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
// Query para buscar os dados
$query = "SELECT motivo, COUNT(*) AS quantidade FROM dados_wyntech GROUP BY motivo";

// Executa a query
$result = $conn->query($query);

// Define o nome do arquivo CSV
$filename = "Total ocorrências.csv";

// Cabeçalho do arquivo CSV
$header = array('Ocorrências', 'Quantidade');

// Abre o arquivo CSV para escrita
$file = fopen('php://output', 'w');

// Escreve o cabeçalho no arquivo
fputcsv($file, $header);

// Escreve os dados no arquivo
while($row = $result->fetch_assoc()) {
    fputcsv($file, $row);
}

// Fecha o arquivo
fclose($file);

// Define o tipo de arquivo e o nome para download
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="' . $filename . '";');

// Encerra a execução do script
exit();
?>