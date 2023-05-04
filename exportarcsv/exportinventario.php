<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location: login.html');
}
$logado = $_SESSION['login'];

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="invetário xaxim.csv"');

$pdo = new PDO('mysql:host=172.10.20.53;dbname=ocsweb', 'andre', 'somores013');
$sql = "SELECT name AS 'Estação', bios.ssn AS 'num/serie', userid AS 'usuario', workgroup AS 'dominio', osversion AS 'versão windows', processort AS 'processador', memory AS 'memoria', ipaddr AS 'ip', drives.total AS 'Total HD', drives.free AS 'Total Livre do HD'
        FROM hardware 
        JOIN bios ON hardware.id = bios.hardware_id
        JOIN drives ON hardware.id = drives.hardware_id
        JOIN accountinfo ON hardware.id = accountinfo.hardware_id
        WHERE accountinfo.fields_3 = 'xaxim'";

$stmt = $pdo->query($sql);

$delimiter = ';';
$f = fopen('php://output', 'w');
$fields = array('Estação', 'num/serie', 'usuario', 'dominio', 'versão windows', 'processador', 'memoria', 'ip', 'Total HD', 'Total Livre do HD');
fputcsv($f, $fields, $delimiter);

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    fputcsv($f, $row, $delimiter);
}

fclose($f);
exit;

?>
