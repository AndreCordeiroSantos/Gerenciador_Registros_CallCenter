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
if ($_SESSION['tipo'] != 'admin' && $_SESSION['tipo'] != 'suporte' && $_SESSION['tipo'] != 'gerencia') {
	echo "<script language='javascript' type='text/javascript'>
	alert('VOCÊ NÃO TEM ACESSO A ESSA PÁGINA.');window.location
	.href='inventario.php';</script>";
}
 $servername = "172.10.20.47";
 $usernameDB = "archer";
 $passwordDB = "B5n3Qz2vL7HAUs7z";
 $dbname = "archerx";

 $conn = new PDO("mysql:host=$servername;dbname=" . $dbname, $usernameDB, $passwordDB);
 if (!$conn) {
   die("Conexão falhou: " . mysqli_connect_error());
 }
?>