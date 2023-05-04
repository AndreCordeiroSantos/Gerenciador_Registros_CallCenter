<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location: login.html');
}
$logado = $_SESSION['login'];


header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="estações.csv"');
// conexão com o banco de dados
$conn = new mysqli('172.10.20.47', 'archer', 'B5n3Qz2vL7HAUs7z', 'archerx');

// verificação de erros na conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Query para buscar os dados
$query = "SELECT et AS 'Estação', COUNT(*) AS 'Total de chamados' FROM dados_wyntech GROUP BY et ORDER BY COUNT(*) DESC";

// Executa a query
$result = $conn->query($query);

// Cria um array com os dados
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Cria o arquivo CSV
$output = fopen('php://output', 'w');
fputcsv($output, array('Estação', 'Total de chamados')); // adiciona os nomes das colunas
foreach ($data as $row) {
    fputcsv($output, $row);
}
fclose($output);

// Fecha a conexão com o banco de dados
$conn->close();

?>
