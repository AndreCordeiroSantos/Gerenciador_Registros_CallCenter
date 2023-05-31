
<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location: login.html');
}
$logado = $_SESSION['login'];
// Conecta ao banco de dados
$db = new mysqli('#', '#', '#', '#');

// Obtém os dados do novo usuário a partir da solicitação
$newUserName = $_POST['newUserName'];
$newUserLogin = $_POST['newUserLogin'];
$newUserPassword = $_POST['newUserPassword'];
$newUserType = $_POST['newUserType'];

// Prepara a consulta SQL
$stmt = $db->prepare('INSERT INTO sua_tabela (nome, login, senha, tipo) VALUES (?, ?, ?, ?)');
$stmt->bind_param('ssss', $newUserName, $newUserLogin, $newUserPassword, $newUserType);

// Executa a consulta
$stmt->execute();

?>

<!-- Adicione o HTML para o alerta -->
<div id="alert" style="display: none;">
  <div class="alert-content">
    <p>Usuário criado com sucesso!</p>
	<br>
    <button onclick="closeAlert()">OK</button>
  </div>
</div>

<!-- Adicione o CSS para estilizar o alerta -->
<style>
#alert {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
}

.alert-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 50px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
}

.alert-content p {
  margin: 0;
  font-size: 20px;
}

.alert-content button {
  background-color: #4CAF50;
  color: white;
  padding: 15px 25px;
  border: none;
  border-radius: 4px;
}
</style>

<!-- Adicione o JavaScript para exibir e ocultar o alerta -->
<script>
function showAlert() {
  document.getElementById("alert").style.display = "block";
}

function closeAlert() {
    document.getElementById("alert").style.display = "none";
    window.location.href = 'usuarios.php';
}
</script>

<?php
// Exibe o alerta
echo '<script>showAlert();</script>';
?>