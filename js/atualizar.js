// Código JavaScript para enviar solicitação AJAX
function atualizarAdmin(id) {
    var nome = document.getElementById('nome' + id).value;
    var login = document.getElementById('login' + id).value;
    var senha = document.getElementById('senha' + id).value;
    var tipo = document.querySelector('select[name="tipo[]"]').value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Processa a resposta do servidor
            console.log(this.responseText);
        }
    };
    xhr.open("POST", "acoes_usuario.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id=" + id + "&nome=" + nome + "&login=" + login + "&senha=" + senha + "&tipo=" + tipo);
}