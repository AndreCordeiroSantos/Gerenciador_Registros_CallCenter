<?php
// Conectar ao primeiro banco de dados
$host = "172.10.20.53";
$user = "andre";
$password = "somores013";
$dbname = "ocsweb";
// Conexão com o banco de dados
$conn = new mysqli($host, $user, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Conectar ao segundo banco de dados
$usuario_db1 = 'archer';
$senha_db1 = 'B5n3Qz2vL7HAUs7z';
$database_db1 = 'archerx';
$host_db1 = '172.10.20.47';
$conn1 = new mysqli($host_db1, $usuario_db1, $senha_db1, $database_db1);
// Verificar se houve erro na conexão com o segundo banco de dados
if ($conn1->connect_error) {
  die("Connection failed: " . $conn1->connect_error);
}

//consulta primeira tabela do ocs
$sql = "SELECT name, bios.ssn, userid, workgroup, processort, memory, ipsrc, lastdate, drives.total, drives.free,
        (drives.free / drives.total) * 100 AS percent_free
          FROM hardware 
          JOIN bios ON hardware.id = bios.hardware_id
          JOIN drives ON hardware.id = drives.hardware_id
          JOIN accountinfo ON hardware.id = accountinfo.hardware_id
        WHERE accountinfo.fields_3 = 'xaxim' AND drives.total <> 0
        ORDER BY percent_free <= 15 DESC";
// Executar a primeira consulta no primeiro banco de dados
$result = $conn->query($sql);

// Segunda consulta SQL para juntar informações dos dois bancos de dados
$sql2 = "SELECT hosts.hostname, baia.baia
        FROM acs_uni
        INNER JOIN hosts ON acs_uni.id_hostname = hosts.id
        INNER JOIN baia ON acs_uni.id_baia = baia.id";
// Executar a segunda consulta no segundo banco de dados
$result2 = $conn1->query($sql2);


// array associativo a partir dos resultados da segunda consulta
$baia_por_hostname = array();
if ($result2->num_rows > 0) {
  while ($row = $result2->fetch_assoc()) {
    $baia_por_hostname[$row["hostname"]] = $row["baia"];
  }
}

$baia = isset($baia_por_hostname[$row["name"]]) ? $baia_por_hostname[$row["name"]] : "";

$result = mysqli_query($conn1, $query);
$result2 = mysqli_query($conn, $query);

$data = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
}
if ($result2->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
}

echo json_encode($data);
