<?php
session_start();
if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true))
	{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location: login.html');
	}
$logado = $_SESSION['login'];
// Check the user's type and restrict access to this page if necessary
if ($_SESSION['tipo'] != 'admin' && $_SESSION['tipo'] != 'suporte') {
	echo "<script language='javascript' type='text/javascript'>
	alert('VOCÊ NÃO TEM ACESSO A ESSA PÁGINA.');window.location
	.href='inventario.php';</script>";
}

include_once('conexao.php');
 // Verifique se o campo id foi enviado
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare a consulta SQL
    $stmt = $conn->prepare("SELECT et, usuario, motivo, causa, solucao, descricao FROM dados_wyntech WHERE id = :id");
    $stmt->bindParam(':id', $id);

    // Execute a consulta SQL
    $stmt->execute();

    // Verifique se a consulta foi bem-sucedida
    if ($stmt->rowCount() > 0) {
        // Os dados foram retornados com sucesso
        // Retorne os dados como JSON
        echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    } else {
        // Nenhum dado foi encontrado
        echo json_encode(array());
    }

}