
<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location: login.html');
}
$logado = $_SESSION['login'];

// Conecta ao banco de dados
$conn = new mysqli('172.10.20.47', 'archer', 'B5n3Qz2vL7HAUs7z', 'archerx');

// Query para buscar os dados
$query = "SELECT COUNT(*) AS total, DATE_FORMAT(data, '%Y-%m') AS mes FROM dados_wyntech GROUP BY mes ORDER BY mes";

// Executa a consulta
$result = $conn->query($query);

// Define o tipo de conteúdo como CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Dados mensais.csv"');

// Abre o arquivo de saída
$output = fopen('php://output', 'w');

// Escreve o cabeçalho
fputcsv($output, array('Mês', 'Total'));

// Escreve os dados
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    fputcsv($output, array($row['mes'], $row['total']));
  }
}

// Fecha o arquivo de saída e a conexão com o banco de dados
fclose($output);
$conn->close();
?>